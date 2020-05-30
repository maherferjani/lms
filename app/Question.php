<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @package App
 * @property string $topic
 * @property text $question_text
 * @property text $code_snippet
 * @property text $answer_explanation
 * @property string $more_info_link
*/
class Question extends Model
{

    protected $fillable = ['question_text', 'answer_explanation', 'qcm_id'];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQcmIdAttribute($input)
    {
        $this->attributes['qcm_id'] = $input ? $input : null;
    }

    public function qcm()
    {
        return $this->belongsTo(Qcm::class, 'qcm_id');
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id');
    }
}
