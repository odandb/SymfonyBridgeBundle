<?php

namespace LightSaml\SymfonyBridgeBundle\Tests\DependencyInjection;

use LightSaml\SymfonyBridgeBundle\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends TestCase
{
    public function test_passes_with_own_entity_id_only(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_does_not_allow_empty_config(): void
    {
        $this->expectExceptionMessage('The child config "own" under "light_saml_symfony_bridge" must be configured');
        $this->expectException(InvalidConfigurationException::class);

        $config = [
            'light_saml_symfony_bridge' => [

            ],
        ];
        $this->processConfiguration($config);
    }

    public function test_allows_own_entity_descriptor_provider_from_file(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                    'entity_descriptor_provider' => [
                        'filename' => '/some/path',
                    ],
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_own_entity_descriptor_provider_from_file_with_entity_id(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                    'entity_descriptor_provider' => [
                        'filename' => '/some/path',
                        'entity_id' => 'id',
                    ],
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_own_entity_descriptor_provider_from_service(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                    'entity_descriptor_provider' => [
                        'id' => 'some.service',
                    ],
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_own_credentials_from_files(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                    'credentials' => [
                        [
                            'certificate' => '/some/path.crt',
                            'key' => '/some/path.pem',
                            'password' => 'aaa',
                        ],
                        [
                            'certificate' => '/other/path.crt',
                            'key' => '/other/path.pem',
                        ],
                    ],
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_system_event_dispatcher(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                ],
                'system' => [
                    'event_dispatcher' => 'some.id',
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_system_logger(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                ],
                'system' => [
                    'logger' => 'some.id',
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_store_request(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                ],
                'store' => [
                    'request' => 'some.id',
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_store_id_state(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                ],
                'store' => [
                    'id_state' => 'some.id',
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_store_sso_state(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                ],
                'store' => [
                    'sso_state' => 'some.id',
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    public function test_allows_party_idp_from_files(): void
    {
        $config = [
            'light_saml_symfony_bridge' => [
                'own' => [
                    'entity_id' => 'http://own.id',
                ],
                'party' => [
                    'idp' => [
                        'files' => [
                            'first.xml',
                            'second.xml',
                        ],
                    ],
                ],
            ],
        ];
        $this->assertIsArray($this->processConfiguration($config));
    }

    protected function processConfiguration(array $configs): array
    {
        $configuration = new Configuration();
        return (new Processor())->processConfiguration($configuration, $configs);
    }
}
