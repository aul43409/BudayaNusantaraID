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
        'category',
        'region',
        'description',
        'image_path',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the full URL for the gallery image.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return null;
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
        return $categories[$this->category] ?? $this->category;
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
     * Untuk saat ini sama dengan recent, nanti bisa ditambah field views
     */
    public function scopePopular($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}