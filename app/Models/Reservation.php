<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * \App\Models\EmdArea
 *
 * @property int $id
 * @property int $sigg_area_id
 * @property int $code
 * @property string $name
 * @property string $wards_name
 * @property string|null $description
 * @property string|null $version
 * @property mixed|null $polygon
 * @property mixed|null $location
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read SiggArea $siggArea
 * @method static Builder|EmdArea newModelQuery()
 * @method static Builder|EmdArea newQuery()
 * @method static Builder|EmdArea query()
 * @method static Builder|EmdArea whereCode($value)
 * @method static Builder|EmdArea whereCreatedAt($value)
 * @method static Builder|EmdArea whereDeletedAt($value)
 * @method static Builder|EmdArea whereDescription($value)
 * @method static Builder|EmdArea whereId($value)
 * @method static Builder|EmdArea whereLocation($value)
 * @method static Builder|EmdArea whereName($value)
 * @method static Builder|EmdArea wherePolygon($value)
 * @method static Builder|EmdArea whereSiggAreaId($value)
 * @method static Builder|EmdArea whereUpdatedAt($value)
 * @method static Builder|EmdArea whereVersion($value)
 * @method static Builder|EmdArea whereWardsName($value)
 * @mixin Eloquent
 */

class Reservation extends AbstractModel
{
    const STATUS_PENDING   = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_EXECUTING = 3;
    const STATUS_NOTIFIED  = 4;

    protected $table = 'reservations';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'product_id',
        'buyer_id',
        'seller_id',
        'thread_id',
        'time_remind',
        'time_reservation',
        'status',
    ];
}
