<?php
namespace Page\Acceptance;

use \Facebook\WebDriver\WebDriver;
use \Facebook\WebDriver\WebDriverElement;
use \Facebook\WebDriver\WebDriverExpectedCondition;
use \Facebook\WebDriver\WebDriverBy;

class UtilFunctions extends \Codeception\Module
{


    private function waitFor(\AcceptanceTester $I, $element) {
        $I->waitForElement($element);
    }

    public function buttonClick(\AcceptanceTester $I, $buttonCss) {
        $this->waitFor($I, $buttonCss);
        $I->click($buttonCss);
    }

    public function fieldFilling(\AcceptanceTester $I, $fieldCss, $fieldValue) {
        $I->waitForElement($fieldCss);
        $I->fillField($fieldCss, $fieldValue);
    }

    public function elementHover(WebDriver $wd, WebDriverElement $element, $elementCss) {
        $wd->wait(30)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector($elementCss)));
        $wd->getMouse()->mouseMove($element->getCoordinates());
    }

    public function checkElementIsVisible(WebDriverElement $element) {
        $element->isEnabled();
    }

    public function getElementFromPage(WebDriver $wd, $elementCss) {
        return $wd->findElement(WebDriverBy::cssSelector($elementCss));
    }

    public function getElementsCollectionFromPage(WebDriver $wd, $searchingElementsCss) {
        return $wd->findElements(WebDriverBy::cssSelector($searchingElementsCss));
    }

    public function getElementFromOtherElement(WebDriver $wd, WebDriverElement $rootElement, $elementCss) {
        $wd->wait(30)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector($elementCss)));
        return $rootElement->findElement(WebDriverBy::cssSelector($elementCss));
    }

    public function getElementsCollectionFromOtherElement(WebDriverElement $rootElement, $searchingElementsCss) {
        return $rootElement->findElements(WebDriverBy::cssSelector($searchingElementsCss));
    }

}