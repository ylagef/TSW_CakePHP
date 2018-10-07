<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssignationsFixture
 *
 */
class AssignationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idUser' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idGap' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idUser' => ['type' => 'index', 'columns' => ['idUser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idGap', 'idUser'], 'length' => []],
            'assignations_ibfk_1' => ['type' => 'foreign', 'columns' => ['idGap'], 'references' => ['gaps', 'idGap'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'assignations_ibfk_2' => ['type' => 'foreign', 'columns' => ['idUser'], 'references' => ['users', 'idUser'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'idUser' => 1,
                'idGap' => 1
            ],
        ];
        parent::init();
    }
}
