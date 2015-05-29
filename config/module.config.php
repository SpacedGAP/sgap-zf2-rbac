<?php
/**
 * var $module and $module_dir is define in Module Class
 */
return array(
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
