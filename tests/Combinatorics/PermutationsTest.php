<?php
/**
 * Created by PhpStorm.
 * User: smskin
 * Date: 24/10/2018
 * Time: 17:10
 */

namespace SMSkin\Math\Tests\Combinatorics;

use PHPUnit\Framework\TestCase;
use SMSkin\Math\Combinatorics;

class PermutationsTest extends TestCase
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
            [
                'a1' => 1
            ],
            [
                'a2' => 2
            ]
        ];

        $this->assertEquals($assertResult,$instance->permutations($input,1));
    }

    public function test1(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2
        ];

        $assertResult = [
            [
                'a1' => 1,
                'a2' => 2
            ],
            [
                'a2' => 2,
                'a1' => 1
            ]
        ];

        $this->assertEquals($assertResult,$instance->permutations($input,2));
    }

    public function test2(){
        $instance = $this->instance;

        $input = [
            'a1' => 1,
            'a2' => 2,
            'a3' => 3
        ];

        $assertResult = [
            [
                'a1' => 1,
                'a2' => 2
            ],
            [
                'a2' => 2,
                'a1' => 1
            ],
            [
                'a1' => 1,
                'a3' => 3
            ],
            [
                'a3' => 3,
                'a1' => 1
            ],
            [
                'a2' => 2,
                'a3' => 3
            ],
            [
                'a3' => 3,
                'a2' => 2
            ]
        ];

        $this->assertEquals($assertResult,$instance->permutations($input,2));
    }
}