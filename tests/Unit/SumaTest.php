<?php

test('la suma funciona', function () {
    $resultado = 2 + 3;

    expect($resultado)->toBe(5);
});
