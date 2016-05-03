<?php

namespace App\Fillers;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class RoleFiller {
    /**
     * The user permissions.
     *
     * @var Collection
     */
    protected $userPermissions;

    /**
     * Builds permissions tree.
     *
     * @param  Collection  $permissions
     * @return string
     */
    public function permissionsTree(Collection $userPermissions)
    {
        $permissions = Permission::all();
        $this->userPermissions = $userPermissions;

        $tree = '<ul class="list-permission">';

        $tree .= $this->buildNode($permissions->tree('name'), 'permissions');

        $tree .= '</ul>';

        return $tree;
    }

    /**
     * Builds a given node of tree.
     *
     * @param  mixed  $node
     * @param  string  $name
     * @return string
     */
    protected function buildNode($node, $name)
    {
        $treeNode = '<li class="list-permission-item">';

        if (is_array($node)) {
            $treeNode .= '<h4>' . trans("permissions-tree.{$name}") . '</h4>';
            $treeNode .= $this->buildBranch($node);
        } else {
            $treeNode .= $this->buildLeaf($node);
        }

        $treeNode .= '</li>';

        return $treeNode;
    }

    /**
     * Builds a given branch of tree.
     *
     * @param  array  $branch
     * @return string
     */
    protected function buildBranch($branch)
    {
        $treeBranch = '<ul class="list-permission">';

        foreach ($branch as $name => $node) {
            $treeBranch .= $this->buildNode($node, $name);
        }

        $treeBranch .= '</ul>';

        return $treeBranch;
    }

    /**
     * Builds a given leaf of tree.
     *
     * @param  Model  $leaf
     * @return string
     */
    protected function buildLeaf($leaf)
    {
        $checked = $this->userPermissions->contains($leaf) ? 'checked' : '';
        $description = e($leaf->description);

        $checkbox = "
            <div class=\"checkbox icheck\">
                <label>
                    <input type=\"checkbox\" name=\"permission_list[]\" value=\"{$leaf->id}\" {$checked} />
                    {$description}
                </label>
            </div>
        ";

        return $checkbox;
    }
}
