<?php

if (!function_exists('getPriorityClass')) {
    function getPriorityClass($priority)
    {
        switch ($priority) {
            case 'critical':
                return 'bg-red-500 text-white';
            case 'high':
                return 'bg-orange-500 text-white';
            case 'medium':
                return 'bg-yellow-500 text-black';
            case 'low':
                return 'bg-green-500 text-white';
            default:
                return 'bg-gray-500 text-white'; // fallback class
        }
    }
}
