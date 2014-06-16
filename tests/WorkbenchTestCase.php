<?php

    use Illuminate\Foundation\Testing\TestCase;

    class WorkbenchTestCase extends TestCase {

        /**
         * Creates the application.
         *
         * @return \Symfony\Component\HttpKernel\HttpKernelInterface
         */
        public function createApplication()
        {
            $unitTesting = true;

            $testEnvironment = 'testing';

            return require __DIR__.'/../../../../bootstrap/start.php';
        }

    }
