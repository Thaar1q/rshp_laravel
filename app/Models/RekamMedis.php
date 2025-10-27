<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = false;

    protected $fillable = [
        'created_at',
        'anamnesa',
        'temuan_klinis',
        'diagnosa',
        'idpet',
        'dokter_pemeriksa'
    ];

    /**
     * Hewan yang direkam (relasi ke Pet)
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet');
    }

    /**
     * Dokter pemeriksa (relasi ke RoleUser, bukan langsung User)
     */
    public function dokter()
    {
        return $this->belongsTo(RoleUser::class, 'dokter_pemeriksa');
    }

    /**
     * Detail tindakan & terapi
     */
    public function detailRekamMedis()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis');
    }
}
