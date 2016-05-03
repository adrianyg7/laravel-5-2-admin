<?php

return [

    /**
     * The User model used in Acl.
     */
    'user' => 'App\Models\User',

    /**
     * The Role model used in Acl.
     */
    'role' => 'App\Models\Role',

    /**
     * The Permission model used in Acl.
     */
    'permission' => 'App\Models\Permission',

    /**
     * Unauthorized message.
     */
    'unauthorized_message' => 'No autorizado.',

    /**
     * The excepted routes in Acl.
     */
    'except' => [
        'admin.dashboard',
    ],

    /**
     * The additional permissions to register in Acl.
     */
    'additional' => [
        'admin.users.show-all' => 'Mostrar perfil de cualquier usuario.',
    ],

    /**
     * Description of permissions in Acl.
     */
    'permission_placeholders' => [
        'admin.users.index' => 'Listado de Usuarios.',
        'admin.users.create' => 'Forma crear Usuario.',
        'admin.users.store' => 'Crear Usuario.',
        'admin.users.show' => 'Mostrar Usuario.',
        'admin.users.edit' => 'Forma editar Usuario.',
        'admin.users.update' => 'Editar Usuario.',
        'admin.users.update-password' => 'Cambiar Contraseña.',
        'admin.users.destroy' => 'Eliminar Usuario.',
        'admin.users.show-all' => 'Mostrar perfil cualquier Usuario.',
        'admin.roles.index' => 'Listado de Roles.',
        'admin.roles.create' => 'Forma crear Rol.',
        'admin.roles.store' => 'Crear Rol.',
        'admin.roles.edit' => 'Forma editar Rol.',
        'admin.roles.update' => 'Editar Rol.',
        'admin.roles.destroy' => 'Eliminar Rol.',
        'admin.permissions.index' => 'Listado de Permisos.',
        'admin.permissions.create' => 'Forma crear Permiso.',
        'admin.permissions.store' => 'Crear Permiso.',
        'admin.permissions.edit' => 'Forma editar Permiso.',
        'admin.permissions.update' => 'Editar Permiso.',
        'admin.permissions.destroy' => 'Eliminar Permiso.',
    ],
    
];
