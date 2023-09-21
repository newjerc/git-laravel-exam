<?php

namespace App\Models;

use App\Models\transaction_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'tr_type',
        'tr_name',
        'tr_amount',
        'tr_date',
    ];

    public function typeName(){
        //แบบ EQ (eloquent) ต้องมีการสร้างคลาสเพื่อส่งค่าname ในตาราง users ที่เชื่อมตาราง department โดยที่่ users(id) = department (user_id)
        return $this->hasOne(transaction_type::class,'t_id','tr_type');
    }
}
