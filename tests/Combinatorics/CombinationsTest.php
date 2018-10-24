<?php
/**
 * Created by PhpStorm.
 * User: smskin
 * Date: 24/10/2018
 * Time: 16:17
 */

namespace SMSkin\Math\Tests\Combinatorics;

use PHPUnit\Framework\TestCase;
use SMSkin\Math\Combinatorics;

class CombinationsTest extends TestCase
{
    /**
     * @var Combinatorics
     */
    protected $instance;

    protected function setUp()
    {
        $this->instance = new Combinatorics();
    }

    protected function tearDown()
    {
        $this->instance = null;
    }

    public function test0(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2
        ];

        $assertResult = [
            $input
        ];

        $this->assertEquals($assertResult,$instance->combinations($input));
    }

    public function test1(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2
        ];

        $assertResult = [
            $input
        ];

        $this->assertEquals($assertResult,$instance->combinations($input,count($input)+1));
    }

    public function test2(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2
        ];

        $assertResult = [];

        $this->assertEquals($assertResult,$instance->combinations($input,0));
    }

    public function test3(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2
        ];

        $assertResult = [
            $input
        ];

        $this->assertEquals($assertResult,$instance->combinations($input,count($input)));
    }

    public function test4(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2
        ];

        $assertResult = [
            [
                'a1' => 1
            ],
            [
                'a2' => 2
            ]
        ];

        $this->assertEquals($assertResult,$instance->combinations($input,1));
    }

    public function test5(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2,
            'a3' => 3
        ];

        $assertResult = [
            [
                'a1' => 1,
                'a2' => 2,
            ],
            [
                'a1' => 1,
                'a3' => 3
            ],
            [
                'a2' => 2,
                'a3' => 3
            ]
        ];

        $this->assertEquals($assertResult,$instance->combinations($input,2));
    }

    public function test6(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2,
            'a3' => 3,
            'a4' => 4
        ];

        $assertResult = [
            [
                'a1' => 1,
                'a2' => 2
            ],
            [
                'a1' => 1,
                'a3' => 3
            ],
            [
                'a1' => 1,
                'a4' => 4
            ],
            [
                'a2' => 2,
                'a3' => 3
            ],
            [
                'a2' => 2,
                'a4' => 4
            ],
            [
                'a3' => 3,
                'a4' => 4
            ],
        ];

        $this->assertEquals($assertResult,$instance->combinations($input,2));
    }

    public function test7(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2,
            'a3' => 3,
            'a4' => 4
        ];

        $assertResult = [
            [
                'a1' => 1,
                'a2' => 2,
                'a3' => 3
            ],
            [
                'a1' => 1,
                'a2' => 2,
                'a4' => 4
            ],
            [
                'a1' => 1,
                'a3' => 3,
                'a4' => 4
            ],
            [
                'a2' => 2,
                'a3' => 3,
                'a4' => 4
            ]
        ];

        $this->assertEquals($assertResult,$instance->combinations($input,3));
    }
}
