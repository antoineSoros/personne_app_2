<?php


use \PHPUnit\Framework\TestCase ;
use \dao\PersonneDao;


class TestPersonneDao extends TestCase {


private static $dao;

private static $nb;
//    public function setUp(){
//        $this->nb =45;
//    }

    /**
     * @beforeClass
     */
public static function init()
{
    TestPersonneDao::$dao = new PersonneDao();
}

    public function testPremier(){
//
//        $this->assertEquals(45.00000,TestPersonneDao::$nb);
//        $this->assertGreaterThan(12,13);
//        $this->assertTrue(!false);

        $result = PersonneDao::$dao->getPersonnes();
        $this->assertCount(54,$result);



    }



}