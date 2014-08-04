<?php

use voku\helper\Hooks;

error_reporting(E_ERROR);
ini_set('display_errors', false);

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-08-21 at 08:25:04.
 */
class HooksTest extends PHPUnit_Framework_TestCase
{

  /**
   * @var Hooks
   */
  protected $hooks;

  /**
   * @var string
   */
  protected $testString_1 = 'lalllöäü123';

  /**
   * @var string
   */
  protected $testString_2 = 'lalll_§$§$&&//"?23';

  /**
   * @param $input
   *
   * @return string
   */
  public function hookTestString_1($input)
  {
    return $input . $this->testString_1;
  }

  /**
   * @param $input
   *
   * @return string
   */
  public function hookTestString_2($input)
  {
    return $input . $this->testString_2;
  }

  /**
   * testHooks
   */
  public function testHooks()
  {
    $this->hooks->add_filter('test', array($this, 'hookTestString_1'));
    $this->hooks->add_filter('test', array($this, 'hookTestString_2'));

    $lall = $this->hooks->apply_filters('test', '');

    $this->assertEquals($lall, $this->testString_1 . $this->testString_2);
  }

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp()
  {
    $this->hooks = Hooks::getInstance();
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown()
  {
  }

}
