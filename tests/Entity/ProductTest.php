<?php
namespace App\Tests\Entity;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;
class ProductTest extends TestCase{
public function testDefault(){
 $product = new Product('Pomme', 'food', 1);
 $this->assertSame(0.055, $product->computeTVA());

 }
 public function testNoDefault(){
    $product2 = new Product('Pomme', 'notfood', 10);
    $this->assertSame(1.96, $product2->computeTVA());

}
public function testNegativePriceComputeTVA(){
    $product = new Product('Un produit', 'food', -20);
    $this->expectException('Exception');
    $product->computeTVA();
    }
     /**
 * @dataProvider pricesForFoodProduct
 */
public function testcomputeTVAFoodProduct($price, $expectedTva){
        $product = new Product('Un produit','food', $price);
        $this->assertSame($expectedTva, $product->computeTVA());
        }
        public function pricesForFoodProduct(){
        return [[0, 0.0],[20, 1.1],[100, 5.5]];
        }
        

}

?>