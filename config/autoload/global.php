<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(


		'service_manager' => array(
				'abstract_factories' => array(
						'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
						'Zend\Log\LoggerAbstractServiceFactory',
				),
				'aliases' => array(
						'translator' => 'MvcTranslator',
				),
		),

		'translator' => array(
				'translation_file_patterns' => array(

						array(
								'type'     => 'gettext',
								'base_dir' => __DIR__ . '/../../module/Application/resource/language/text',
								'pattern'  => '%s.mo',
						),

						array(
								'type'        => 'phparray',
								'base_dir'    => __DIR__ . '/../../module/Application/languages/validate',
								'pattern'     => '$s.php',
								'text_domain' => 'default'
						),

						array(
								'type'        => 'phparray',
								'base_dir'    => __DIR__ . '/../../module/Application/languages/routes',
								'pattern'     => '$s.php',//%s
								'text_domain' => 'routing'
						)

				),
		),


		'mvlabs_environment' => array(

			// Set this w/ the timezone of your running application
			'timezone' => 'Europe/London',


			// Available locales are listed here. Default(above) must be among them
			'locale' => array(
					'available' => array(
							'en' => array('language' => 'en_US', 'name' => 'English'),
							'it' => array('language' => 'it_IT', 'name' => 'Italiano'),
							'es' => array('language' => 'es_ES', 'name' => 'Espanol'),
					),
					'default' => 'it',
			),

			'php_settings' => array(
					'error_reporting'  =>  E_ALL,
					'display_errors' => 'Off',
					'display_startup_errors' => 'Off',
			),

			'exceptions_from_errors' => true,
			'recover_from_fatal' => true,
			'fatal_errors_callback' => function($s_msg, $s_file, $s_line) {

				// Override this param if you need special logging
				// Default PHP logging is still going to work
				return false;

			},

			// by default, there are no environment/host restrictions
			'allowed_hosts' => null,

		),

);
