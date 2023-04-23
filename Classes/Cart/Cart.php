<?php

class Cart
{
    private $items = [];

    public function addItem(Product $item)
    {
        array_push($this->items, $item);
    }

    public function removeItem(Product $item)
    {
        $index = array_search($item, $this->items);
        if ($index !== false) {
            unset($this->items[$index]);
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }
}
