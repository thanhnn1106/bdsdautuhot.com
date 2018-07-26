<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'luckystar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function matches()
    {
        return $this->belongsToMany(Matches::class, 'users_matches', 'user_id', 'match_id');
    }

    public static function getList($params = array())
    {
        $query = User::where('email', 'LIKE', "%{$params['email']}%");
        if ($params['filter_status'] != '') {
            $query->where('status', '=', $params['filter_status']);
        }
        $result = $query->orderBy('created_at', 'DESC');
        $result = $query->paginate(LIMIT_ROW);

        return $result;
    }

    public static function getUserRanking()
    {
        $users = DB::table('users_matches AS um')
            ->select('um.user_id',
                    DB::raw('COUNT(um.user_id) AS total_match_predict'),
                    DB::raw('SUM(um.point) AS total_point'),
                    DB::raw('SUM(um.win_match) AS total_win_match'),
                    DB::raw('SUM(um.win_score) AS total_win_score'),
                    'u.name',
                    'u.email',
                    'u.luckystar'
              )
            ->rightJoin('users AS u', 'u.id', '=', 'um.user_id')
            ->groupBy('u.name', 'u.email', 'u.luckystar', 'um.user_id')
            ->orderBy('total_point', 'DESC')
            ->get();

        return $users;
    }

    public static function getUserPreHistory($params = array())
    {
        $query = DB::table('users_matches AS um')
            ->select('um.match_id',
                    'um.user_id',
                    'um.home_score AS user_pre_home_score',
                    'um.away_score AS user_pre_away_score',
                    'um.is_lucky_star AS user_is_lucky_star',
                    'um.team_win AS user_pre_team_win',
                    'um.point AS user_point',
                    'um.created_at',
                    'm.home_team AS match_home_team',
                    'm.away_team AS match_away_team',
                    'm.home_score AS match_home_score',
                    'm.away_score AS match_away_score',
                    'm.status AS match_status',
                    'u.name AS user_name',
                    'u.email AS user_email'
            );
            $query->rightJoin('matches AS m', 'm.id', '=', 'um.match_id');
            $query->join('users AS u', 'u.id', '=', 'um.user_id');
            if (isset($params['user_id'])) {
                $query->where('um.user_id', '=', $params['user_id']);
            }
            if (isset($params['email'])) {
                $query->where('u.email', 'LIKE', '%'.$params['email'].'%');
            }
            if (isset($params['match_id'])) {
                $query->where('m.id', '=', $params['match_id']);
            }
            $query->orderBy('um.created_at', 'DESC');
        $usersHistory = $query->paginate(20);

        return $usersHistory;
    }

    public static function getFlag($name)
    {
        $flagName = '';
        switch ($name) {
            case 'Russia':
                $flagName = 'rusia.png';
                return $flagName;
                break;
            case 'Saudi Arabia':
                $flagName = 'arabia.png';
                return $flagName;
                break;
            case 'Egypt':
                $flagName = 'egy.png';
                return $flagName;
                break;
            case 'Uruguay':
                $flagName = 'uru.png';
                return $flagName;
                break;
            case 'Morocco':
                $flagName = 'mar.png';
                return $flagName;
                break;
            case 'Iran':
                $flagName = 'irn.png';
                return $flagName;
                break;
            case 'Portugal':
                $flagName = 'por.png';
                return $flagName;
                break;
            case 'Spain':
                $flagName = 'esp.png';
                return $flagName;
                break;
            case 'France':
                $flagName = 'fra.png';
                return $flagName;
                break;
            case 'Australia':
                $flagName = 'aus.png';
                return $flagName;
                break;
            case 'Argentina':
                $flagName = 'arg.png';
                return $flagName;
                break;
            case 'Iceland':
                $flagName = 'isl.png';
                return $flagName;
                break;
            case 'Peru':
                $flagName = 'per.png';
                return $flagName;
                break;
            case 'Denmark':
                $flagName = 'den.png';
                return $flagName;
                break;
            case 'Croatia':
                $flagName = 'cro.png';
                return $flagName;
                break;
            case 'Nigeria':
                $flagName = 'nga.png';
                return $flagName;
                break;
            case 'Costa Rica':
                $flagName = 'costa-rica.png';
                return $flagName;
                break;
            case 'Serbia':
                $flagName = 'srb.png';
                return $flagName;
                break;
            case 'Germany':
                $flagName = 'ger.png';
                return $flagName;
                break;
            case 'Mexico':
                $flagName = 'mex.png';
                return $flagName;
                break;
            case 'Brazil':
                $flagName = 'bra.png';
                return $flagName;
                break;
            case 'Switzerland':
                $flagName = 'sui.png';
                return $flagName;
                break;
            case 'Sweden':
                $flagName = 'swe.png';
                return $flagName;
                break;
            case 'Korea Republic':
                $flagName = 'kor.png';
                return $flagName;
                break;
            case 'Belgium':
                $flagName = 'bel.png';
                return $flagName;
                break;
            case 'Panama':
                $flagName = 'pan.png';
                return $flagName;
                break;
            case 'Tunisia':
                $flagName = 'tun.png';
                return $flagName;
                break;
            case 'England':
                $flagName = 'eng.png';
                return $flagName;
                break;
            case 'Colombia':
                $flagName = 'colombia.png';
                return $flagName;
                break;
            case 'Japan':
                $flagName = 'japan.png';
                return $flagName;
                break;
            case 'Poland':
                $flagName = 'pol.png';
                return $flagName;
                break;
            case 'Senegal':
                $flagName = 'sen.png';
                return $flagName;
                break;
        }

        return $flagName;
    }
}
