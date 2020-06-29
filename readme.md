# When and Unless

For this to work, we can create a simple trait so we are able to use the helpers on anything we want. These methods will take the condition, and call a ```callable``` if it evaluates to ```true```. For ```unless```, we can just call ```when()``` but with the condition flipped:

```php
<?php
trait Conditionable
{
    public function when($condition, $callable)
    {
        if ($condition) {
            $callable($this, $condition);
        }
        return $this;
    }
    public function unless($condition, $callable)
    {
       return $this->when(!$condition, $callable);
    }
}
```

And we can fully do things like the above. Since it receives a ```callable```, we can even call public static methods from elsewhere just because we can.

```php
$transport->when($express, [Courier::class, 'setExpress'])
```
