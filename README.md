# Math library


## Combinatorics
A package that returns all the combinations and permutations, without repitition, of a given set and subset size. Associative arrays are preserved.
Script based on library Math_Combinatorics with some changes.
URL of original library http://pyrus.sourceforge.net/Math_Combinatorics.html

Methods:

 - combinations(array $set, $subsetSize = null) - Find all combinations given a set and a subset size.
 - permutations(array $set, $subsetSize = null) - Find all permutations given a set and a subset size.

Examples:
Example script you can find in path '/examples/Combinatorics.php'.

    // Example of method combinations();
    // We want get all combinations of $data array for 2 elements in combination.
    $instance = new MathCombinatorics();
    $data = ['a1'=>1,'a2'=>2,'a3'=>3];
    $subsetSize = 2;
    $result = $instance->combinations($data,$subsetSize);
    print_r($result);
    /* Result has data: 
    [  
      [
        'a1'=>1, 
        'a2'=>2
      ],
      [ 'a1'=>1,
        'a3'=>3
      ],
      [
        'a2'=>2,
        'a3'=>3
      ]
    ];  
    */
     
    // Example of method permutations();
    // We want get all permutations of $data array for 2 elements.
    $instance = new MathCombinatorics();
    $data = ['a1'=>1,'a2'=>2,'a3'=>3];
    $subsetSize = 2;
    $result = $instance->permutations($data,$subsetSize);
    print_r($result);
    /* 
    [  
      [
        'a1'=>1,
        'a2'=>2
      ],
      [
        'a2'=>2,
        'a1'=>1
      ],
      [
        'a1'=>1,
        'a3'=>3
      ],
      [
        'a3'=>3,
        'a1'=>1
      ],
      [
        'a2'=>2,
        'a3'=>3
      ],
      [
        'a3'=>3,
        'a2'=>2
      ]
    ];  
    */
    

