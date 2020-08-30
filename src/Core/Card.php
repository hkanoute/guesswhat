<?php

namespace App\Core;

/**
 * Class Card : Définition d'une carte à jouer
 * @package App\Core
 */
class Card
{
  /**
   * @var $name string nom de la carte, comme par exemples 'As' '2' 'Reine'
   */
  private $name;

  /**
   * @var $color string couleur de la carte, par exemples 'Pique', 'Carreau'
   */
  private $color;

  /**
   * Card constructor.
   * @param string $name
   * @param string $color
   */
  public function __construct(string $name, string $color)
  {
    $this->name = $name;
    $this->color = $color;
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  /** définir une relation d'ordre entre instance de Card.
   *  Remarque : cette méthode n'est pas de portée d'instance
   *
   * @see https://www.php.net/manual/fr/function.usort.php
   *
   * @param $o1 Card
   * @param $o2 Card
   * @return int
   * <ul>
   *  <li> zéro si $o1 et $o2 sont considérés comme égaux </li>
   *  <li> -1 si $o1 est considéré inférieur à $o2</li>
    * <li> +1 si $o1 est considéré supérieur à $o2</li>
   * </ul>
   *
   */
  public static function cmp(Card $o1, Card $o2) : int
  {
    // TODO il faudra prendre aussi en compte la couleur !

    $o1Name = strtolower($o1->name);
    $o2Name = strtolower($o2->name);
    if ($o1Name == $o2Name) {
      return 0;
    }
    return ($o1Name > $o2Name) ? +1 : -1;
  }


}