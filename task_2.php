<?php
function findTwoLargestSum(array $arr): int {
    if (count($arr) < 2) {
        throw new Exception("Mảng cần ít nhất 2 phần tử.");
    }

    $max1 = PHP_INT_MIN; // Giá trị nguyên nhỏ nhất
    $max2 = PHP_INT_MIN; // Giá trị nguyên nhỏ nhất
    foreach ($arr as $num) {
        if ($num >= $max1) {
            $max2 = $max1;
            $max1 = $num;
        } elseif ($num > $max2) {
            $max2 = $num;
        }
    }

    return $max1 + $max2;
}

try {
    echo findTwoLargestSum([1, 8, 2, 3, 5]) . "\n";  // Output: 13
    echo findTwoLargestSum([-1, -1, -3, -4]) . "\n"; // Output: -2
    echo findTwoLargestSum([5, 20]) . "\n";         // Output: 25
    echo findTwoLargestSum([0, 0, 0, 0]) . "\n";      // Output: 0
    echo findTwoLargestSum([100]);                   // Throws Exception
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>