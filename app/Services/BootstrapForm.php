<?php

namespace App\Services;

use Collective\Html\FormBuilder;
use Collective\Html\HtmlBuilder;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\Str;
use Watson\BootstrapForm\BootstrapForm as WatsonBootstrapForm;

class BootstrapForm extends WatsonBootstrapForm
{
    /*
     * Constructor
     */
    public function __construct(HtmlBuilder $html, FormBuilder $form, Config $config)
    {
        parent::__construct($html, $form, $config);
    }

    /**
     * Open a form configured for model binding.
     *
     * @param  array  $options
     * @return string
     */
    protected function model($options)
    {
        $model = $options['model'];

        // If the form is passed a model, we'll use the update route to update
        // the model using the POST method.
        if (!is_null($options['model']) && $options['model']->exists) {
            $route = Str::contains($options['update'], '@') ? 'action' : 'route';

            $options[$route] = [$options['update'], $options['model']->getRouteKey()];
            $options['method'] = 'POST';
        } else {
            // Otherwise, we're storing a brand new model using the POST method.
            $route = Str::contains($options['store'], '@') ? 'action' : 'route';

            $options[$route] = $options['store'];
            $options['method'] = 'POST';
        }

        // Forget the routes provided to the input.
        array_forget($options, ['model', 'update', 'store']);

        return $this->form->model($model, $options);
    }

    /**
     * Create the input group for an element with the correct classes for errors.
     *
     * @param  string  $type
     * @param  string  $name
     * @param  string  $label
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function input($type, $name, $label = null, $value = null, array $options = [])
    {
        $label = $this->getLabelTitle($label, $name);

        //Se agrega la siguiente línea para que al dar click en el label, haga focus al input
        $options['id'] = isset($options['id']) ? $options['id'] : $name;

        $options = $this->getFieldOptions($options);
        $inputElement = $type === 'password' ? $this->form->password($name, $options) : $this->form->{$type}($name, $value, $options);
        
        $wrapperOptions = $this->isHorizontal() ? ['class' => $this->getRightColumnClass()] : [];
        $wrapperElement = '<div' . $this->html->attributes($wrapperOptions) . '>' . $inputElement . $this->getFieldError($name) . '</div>';

        return $this->getFormGroupWithLabel($name, $label, $wrapperElement);
    }

    /**
     * Create a select box field.
     *
     * @param  string  $name
     * @param  string  $label
     * @param  array   $list
     * @param  string  $selected
     * @param  array   $options
     * @return string
     */
    public function select($name, $label = null, $list = [], $selected = null, array $options = [])
    {
        $label = $this->getLabelTitle($label, $name);

        $options = $this->getFieldOptions($options);

        //Se agrega la siguiente línea para que al dar click en el label, haga focus al input
        $options['id'] = isset($options['id']) ? $options['id'] : $name;

        $inputElement = $this->form->select($name, $list, $selected, $options);

        $wrapperOptions = $this->isHorizontal() ? ['class' => $this->getRightColumnClass()] : [];
        $wrapperElement = '<div' . $this->html->attributes($wrapperOptions) . '>' . $inputElement . $this->getFieldError($name) . '</div>';

        return $this->getFormGroupWithLabel($name, $label, $wrapperElement);
    }
}
