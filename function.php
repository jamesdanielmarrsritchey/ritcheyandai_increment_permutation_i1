<?php
function nextPermutation($currentPermutation, $validCharacters) {
    // Check if the current permutation is empty or consists of a value not in validCharacters
    if (empty($currentPermutation) || !in_array($currentPermutation[0], $validCharacters)) {
        // Return the first valid permutation
        return [$validCharacters[0]];
    }

    $len = count($currentPermutation);
    $validLen = count($validCharacters);

    // Iterate from the last character to the first in the current permutation
    for ($i = $len - 1; $i >= 0; $i--) {
        $currentIndex = array_search($currentPermutation[$i], $validCharacters);
        // If not the last valid character, move to the next valid character
        if ($currentIndex < $validLen - 1) {
            $currentPermutation[$i] = $validCharacters[$currentIndex + 1];
            // Reset all characters to the right to the first valid character
            for ($j = $i + 1; $j < $len; $j++) {
                $currentPermutation[$j] = $validCharacters[0];
            }
            return $currentPermutation;
        }
    }

    // If all characters were the last valid character, prepend the first valid character
    // This also implicitly removes any initial invalid state by not including it in the new permutation
    return array_fill(0, $len + 1, $validCharacters[0]);
}
?>