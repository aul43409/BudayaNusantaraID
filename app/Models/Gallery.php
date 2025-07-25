<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'galleries';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug', 
        'category',
        'region',
        'description',
        'image_url',
        'is_featured',
        'views'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the full image URL - RENAMED to avoid conflict
     * Gunakan method ini jika Anda menyimpan relative path
     */
    public function getFullImageUrlAttribute()
    {
        if ($this->image_url) {
            // Jika sudah URL lengkap, return as-is
            if (filter_var($this->image_url, FILTER_VALIDATE_URL)) {
                return $this->image_url;
            }
            // Jika relative path, convert ke full URL
            return asset('storage/' . $this->image_url);
        }
        return null;
    }

    /**
     * Check if gallery has valid image
     */
    public function hasValidImage()
    {
        return !empty($this->image_url) && 
               (filter_var($this->image_url, FILTER_VALIDATE_URL) || 
                file_exists(public_path('storage/' . $this->image_url)));
    }

    /**
     * Available categories
     */
    public static function getCategories()
    {
        return [
            'tari-tradisional' => 'Tari Tradisional',
            'musik-tradisional' => 'Musik Tradisional',
            'kerajinan' => 'Kerajinan',
            'kuliner' => 'Kuliner',
            'pakaian-adat' => 'Pakaian Adat',
            'upacara-adat' => 'Upacara Adat',
            'arsitektur' => 'Arsitektur',
            'lainnya' => 'Lainnya'
        ];
    }

    /**
     * Available regions
     */
    public static function getRegions()
    {
        return [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 
            'Jambi', 'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Bangka Belitung',
            'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur',
            'Banten', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur',
            'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara',
            'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat',
            'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat', 'Papua Selatan', 'Papua Tengah', 'Papua Pegunungan', 'Papua Barat Daya'
        ];
    }

    /**
     * Get category display name
     */
    public function getCategoryNameAttribute()
    {
        $categories = self::getCategories();
        return $categories[$this->category] ?? ucfirst(str_replace('-', ' ', $this->category));
    }

    /**
     * Scope untuk pencarian
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', '%' . $term . '%')
                    ->orWhere('description', 'like', '%' . $term . '%');
    }

    /**
     * Scope untuk filter berdasarkan kategori
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope untuk filter berdasarkan region
     */
    public function scopeByRegion($query, $region)
    {
        return $query->where('region', 'like', '%' . $region . '%');
    }

    /**
     * Scope untuk ordering berdasarkan tanggal terbaru
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope untuk ordering berdasarkan popularitas
     */
    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc')
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Scope untuk featured galleries
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}