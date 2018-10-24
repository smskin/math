<?php
/**
 * Created by PhpStorm.
 * User: smskin
 * Date: 24/10/2018
 * Time: 15:51
 */

namespace SMSkin\Math\Interfaces;


interface ICombinatorics
{
    /**
     * Find all combinations given a set and a subset size.
     *
     * @access public
     * @param  array $set          Parent set
     * @param  int   $subset_size  Subset size
     * @return array An array of combinations
     */
    public function combinations(array $set, $subset_size = null);

    /**
     * Find all permutations given a set and a subset size.
     *
     * @access public
     * @param  array $set          Parent set
     * @param  int   $subset_size  Subset size
     * @return array An array of permutations
     */
    public function permutations(array $set, $subset_size = null);
}