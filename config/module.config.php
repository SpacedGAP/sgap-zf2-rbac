<?php
/**
 * var $module and $module_dir is define in Module Class
 */
return array(
    'view_manager' => array(
        'template_map' => array(
            'user/login/form' => "{$module_dir}/view/zfc-user/user/login/form.twig",
        ),
        'template_path_stack' => array(
            // Override zfcuser view templates
            'zfcuser' => "{$module_dir}/view",
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'orm_default' => array(
                'drivers' => array(
                    "Gedmo\Tree\Entity" => "tree_metadata_driver",
                ),
            ),
        ),
        'entity_resolver' => array(
            'orm_default' => array(
                'resolvers' => array(
/*                    
                    'ZfcUser\Entity\UserInterface' => "{$module}\Entity\User",
                    'ZfcRbac\Identity\IdentityInterface' => "{$module}\Entity\User",
*/                    
                ),
            ),
        ),
    ),   
);
