<?php

if (!function_exists('getImageUrl')) {
    /**
     * Get the public URL for a stored image
     * 
     * @param string|null $imagePath
     * @return string
     */
    function getImageUrl($imagePath)
    {
        if (!$imagePath) {
            return '';
        }

        // Try using asset first (requires symbolic link)
        $assetUrl = asset('storage/' . $imagePath);
        
        // If symbolic link doesn't work, try Storage::url
        try {
            if (file_exists(public_path('storage/' . $imagePath))) {
                return $assetUrl;
            }
            
            // Fallback to Storage URL
            return \Illuminate\Support\Facades\Storage::disk('public')->url($imagePath);
        } catch (\Exception $e) {
            // Final fallback
            return $assetUrl;
        }
    }
}

