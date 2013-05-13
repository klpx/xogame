<form method="post" action="<?=$this->createUrl('result')?>">
    Операнд 1: <input type="number" max="100500" name="op[]" /><br/>
    +<br/>
    Операнд 2: <input type="number" max="100500" name="op[]"/><br/>
    =<br/>
    <button type="submit" >Посчитать</button>
</form> 