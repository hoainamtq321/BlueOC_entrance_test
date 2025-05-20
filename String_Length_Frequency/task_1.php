<?php

function mostFrequentLengthStrings(array $strings): array {
    //Kiểm tra đầu vào: chỉ nhận mảng 1 chiều chứa chuỗi
    foreach ($strings as $item) {
        if (!is_string($item)) {
            // Nếu có phần tử không phải chuỗi → trả về rỗng
            echo "Hàm chỉ nhận mảng 1 chiều chứa chuỗi \n";
            return [];
        }
    }
    //Tạo mảng độ dài
    $lengths = [];
    for ($i = 0; $i < count($strings); $i++) {
        $lengths[$i] = strlen($strings[$i]);
    }

    // Đếm tần suất độ dài
    $lengthCounts = []; // key = độ dài, value = số lần xuất hiện
    for ($i = 0; $i < count($lengths); $i++) {
        $len = $lengths[$i];
        $found = false;
        foreach ($lengthCounts as $key => $value) {
            if ($key === $len) {
                $lengthCounts[$key]++;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $lengthCounts[$len] = 1;
        }
    }

    
    //Tìm tần suất lớn nhất
    
    $maxFreq = 0;
    foreach ($lengthCounts as $count) {
        if ($count > $maxFreq) {
            $maxFreq = $count;
        }
    }

    
    //Tìm độ dài phổ biến nhất
    $mostCommonLengths = [];
    foreach ($lengthCounts as $length => $count) {
        if ($count === $maxFreq) {
            $mostCommonLengths[] = $length;
        }
    }
    
    //Lọc chuỗi có độ dài phổ biến
    $result = [];
    for ($i = 0; $i < count($strings); $i++) {
        $len = strlen($strings[$i]);
        for ($j = 0; $j < count($mostCommonLengths); $j++) {
            if ($len === $mostCommonLengths[$j]) {
                $result[] = $strings[$i];
                break;
            }
        }
    }
    return $result;
}

function runTests() {
    $tests = [
        ['a', 'ab', 'abc', 'cd', 'def', 'gh'],
        ['hello', 'hi', 'a', 'hey', 'hu'],
        ['one', 'two', 'three', 'four', 'five'],
        ['abc'], ['abc'],
        [],
        ['a', 'ab', 'abc', 'ba', 'abbb', 'bb', 'a', 'bbbb', 'bbbbabc'],
        [11,2,3,4,5,6],
        ['abc',2,'ab']
    ];

    foreach ($tests as $test) {
        $output = mostFrequentLengthStrings($test);
        print_r($output);
    }
}
runTests();

?>