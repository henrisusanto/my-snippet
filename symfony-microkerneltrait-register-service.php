<?php

use App\LoremIpsum;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

class AppKernel extends Kernel {
    use MicroKernelTrait;

    public function registerBundles() {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
        ];
    }

    protected function configureRoutes(RouteCollectionBuilder $routes) {
        $routes->add('/', 'kernel:exampleAction');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader) {
        $c->loadFromExtension('framework', [
            'secret' => 'r0tf1.XD',
        ]);

        $c->register(LoremIpsum::class)->setArguments([123, 'ABC'])->setPublic(true);
    }

    public function exampleAction() {
        $obj = $this->getContainer()->get(LoremIpsum::class);
        return Response::create((string)$obj);
    }
}

$kernel   = new AppKernel('dev', true);
$request  = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
