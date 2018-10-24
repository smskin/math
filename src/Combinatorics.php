<?php
/**
 * Created by PhpStorm.
 * User: smskin
 * Date: 24/10/2018
 * Time: 15:50
 */

namespace SMSkin\Math;

use SMSkin\Math\Interfaces\ICombinatorics;

/**
 * MathCombinator
 *
 * MathCombinator provides the ability to find all combinations and
 * permutations given an set and a subset size.  Associative arrays are
 * preserved.
 *
 * This library based on library Math_Combinatorics
 *
 * @category   Math
 * @package    Combinatorics
 * @author     David Sanders <shangxiao@php.net>
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    Release: 1.0.0
 * @link       http://pyrus.sourceforge.net/Math_Combinatorics.html
 */

class Combinatorics implements ICombinatorics
{
    /**
     * List of pointers that record the current combination.
     *
     * @var array
     * @access private
     */
    private $_pointers = array();

    /**
     * Find all combinations given a set and a subset size.
     *
     * @access public
     * @param  array $set          Parent set
     * @param  int   $subsetSize  Subset size
     * @return array An array of combinations
     */
    public function combinations(array $set, $subsetSize = null)
    {
        $setSize = count($set);

        if (is_null($subsetSize)) {
            $subsetSize = $setSize;
        }

        if ($subsetSize >= $setSize) {
            return array($set);
        } else if ($subsetSize == 1) {
            return array_chunk($set, 1, true);
        } else if ($subsetSize == 0) {
            return array();
        }

        $combinations = array();
        $setKeys = array_keys($set);
        $this->_pointers = array_slice(array_keys($setKeys), 0, $subsetSize);

        $combinations[] = $this->_getCombination($set);
        while ($this->_advancePointers($subsetSize - 1, $setSize - 1)) {
            $combinations[] = $this->_getCombination($set);
        }

        return $combinations;
    }

    /**
     * Recursive function used to advance the list of 'pointers' that record the
     * current combination.
     *
     * @access private
     * @param  int $pointerNumber The ID of the pointer that is being advanced
     * @param  int $limit          Pointer limit
     * @return bool True if a pointer was advanced, false otherwise
     */
    private function _advancePointers($pointerNumber, $limit)
    {
        if ($pointerNumber < 0) {
            return false;
        }

        if ($this->_pointers[$pointerNumber] < $limit) {
            $this->_pointers[$pointerNumber]++;
            return true;
        } else {
            if ($this->_advancePointers($pointerNumber - 1, $limit - 1)) {
                $this->_pointers[$pointerNumber] =
                    $this->_pointers[$pointerNumber - 1] + 1;
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Get the current combination.
     *
     * @access private
     * @param  array $set The parent set
     * @return array The current combination
     */
    private function _getCombination($set)
    {
        $setKeys = array_keys($set);

        $combination = array();

        foreach ($this->_pointers as $pointer) {
            $combination[$setKeys[$pointer]] = $set[$setKeys[$pointer]];
        }

        return $combination;
    }

    /**
     * Find all permutations given a set and a subset size.
     *
     * @access public
     * @param  array $set          Parent set
     * @param  int   $subsetSize  Subset size
     * @return array An array of permutations
     */
    public function permutations(array $set, $subsetSize = null)
    {
        $combinations = $this->combinations($set, $subsetSize);
        $permutations = array();

        foreach ($combinations as $combination) {
            $permutations = array_merge($permutations,
                $this->_findPermutations($combination));
        }

        return $permutations;
    }

    /**
     * Recursive function to find the permutations of the current combination.
     *
     * @access private
     * @param array $set Current combination set
     * @return array Permutations of the current combination
     */
    private function _findPermutations($set)
    {
        if (count($set) <= 1) {
            return array($set);
        }

        $permutations = array();

        list($key, $val) = $this->arrayShiftAssoc($set);
        $subPermutations = $this->_findPermutations($set);

        foreach ($subPermutations as $permutation) {
            $permutations[] = array_merge(array($key => $val), $permutation);
        }

        $set[$key] = $val;

        $startKey = $key;

        $key = $this->_firstKey($set);
        while ($key != $startKey) {

            list($key, $val) = $this->arrayShiftAssoc($set);
            $subPermutations = $this->_findPermutations($set);

            foreach ($subPermutations as $permutation) {
                $permutations[] = array_merge(array($key => $val), $permutation);
            }

            $set[$key] = $val;
            $key = $this->_firstKey($set);
        }

        return $permutations;
    }

    /**
     * Associative version of array_shift()
     *
     * @access public
     * @param  array $array Reference to the array to shift
     * @return array Array with 1st element as the shifted key and the 2nd
     *               element as the shifted value
     */
    private function arrayShiftAssoc(array &$array)
    {
        $key = $val = null;
        
        foreach ($array as $key => $val) {
            unset($array[$key]);
            break;
        }
        return array($key, $val);
    }

    /**
     * Get the first key of an associative array
     *
     * @param  array $array Array to find the first key
     * @access private
     * @return mixed The first key of the given array
     */
    private function _firstKey($array)
    {
        $key = null;
        
        foreach ($array as $key => $val) {
            break;
        }
        return $key;
    }
}