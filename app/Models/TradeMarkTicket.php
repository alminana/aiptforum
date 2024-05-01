<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class TradeMarkTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'added_by', 'associate_id', 'methode_id', 'assigned_to', 'country_id' ,'class', 'procedure_id',
        'clientref', 'aiptref', 'register_no', 'trademark_name', 'trademark_brief', 'img_paths', 'folder_path', 'related_TKT',
        'filing_date','filing_no','imageexport'
    ];
    public function getIsAdminAttribute()
    {
        return $this->where('id', 1)->exists();
    }

}