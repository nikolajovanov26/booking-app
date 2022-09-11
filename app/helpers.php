<?php

if (!function_exists('ratingString')) {
    function ratingString($rating): string
    {
        switch ($rating) {
            case ($rating < 0):
                return 'Not rated';
            case ($rating <= 1.0):
                return 'Terrible';
            case ($rating <= 3.0):
                return 'Poor';
            case ($rating <= 6.0):
                return 'Nice';
            case ($rating <= 7.5):
                return 'Good';
            case ($rating <= 8.5):
                return 'Very Good';
            case ($rating <= 9.5):
                return 'Exceptional';
            case ($rating <= 10.0):
                return 'Superb';
            default:
                return 'Review score';
        }
    }
}
