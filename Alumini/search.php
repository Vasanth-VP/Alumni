<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" type="text/css" href="style_new.css">
<link rel="stylesheet" type="text/css" href="filter.css">

</head>
<body>
<form method=post action="search.php">
<?php echo display_error(); ?>
<header>
  <h2>Welcome to Hindusthan Educational Institutions</h2>
  <div class="navbar_home">
  <button class="w3-large">
  <i class="fa fa-home"></i>
    </button>
  
  </div>
  <div class="navbar">
  
  			<div class="dropdown">
    			<button class="dropbtn">
    
   				 <i class="fa fa-user icon"  style="font-size:24px;"></i>
    			 <i class="fa fa-caret-down" style="font-size:20px;"></i>
       				Profile
      			 </button>
      			 
    			<div class="dropdown-content">
      			<a href="profile_update.php">Update</a>
      			<a href="login.php">Logout</a>
    			</div>
  			</div> 
		</div>
</header>

<section>
  <nav>
  <label> Search</label>
		<input type="search" name="search" width="1%">
		<input type="submit" name="search_submit">
    <ul>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>
  </nav>
  
  <article>
  
  <select id="filter-company" class="filter">
      <option value="0">No value</option>
      <option value="Alfreds">Alfreds</option>
      <option value="Centro">Centro</option>
      <option value="Ernst">Ernst</option>
      <option value="Island">Island</option>
      <option value="Laughing">Laughing</option>
      <option value="Magazzini">Magazzini</option>
    </select> 

    <select id="filter-contact" class="filter">
      <option value="0">No value</option>
      <option value="Maria Anders">Maria Anders</option>
      <option value="Francisco Chang">Francisco Chang</option>
      <option value="Roland Mendel">Roland Mendel</option>
    </select>  

    <select id="filter-range" class="filter">
      <option value="0" data-min="1" data-max="1" >No value</option>
      <option value="£100,000 - £200,000" data-min="100000" data-max="200000" >£100,000 - £200,000</option>
      <option value="£200,000 - £300,000" data-min="200000" data-max="300000" >£200,000 - £300,000</option>
      <option value="£300,000 - £400,000" data-min="300000" data-max="400000" >£300,000 - £400,000</option>
      <option value="£400,000 - £500,000" data-min="400000" data-max="500000" >£400,000 - £500,000</option>
    </select>
  
<!-- ^^ range select box contains data-max and data-min which will be used to compare ranges -->

    <h2>HTML Table</h2>

    <table>
      <thead>
        <tr>
          <th>Company</th>
          <th>Contact</th>
          <th>Range</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="company" data-company="Alfreds">Alfreds</td>
          <td class="contact" data-contact="Maria Anders">Maria Anders</td>
          <td class="range" data-min="200000" data-max="300000">£200,000 - £300,000</td>
        </tr>
        <tr>
          <td class="company"  data-company="Centro">Centro</td>
          <td class="contact" data-contact="Francisco Chang">Francisco Chang</td>
          <td class="range" data-min="100000" data-max="200000">£100,000 - £200,000</td>
        </tr>
        <tr>
          <td class="company" data-company="Alfreds" >Alfreds</td>
          <td class="contact" data-contact="Roland Mendel">Roland Mendel</td>
          <td class="range" data-min="200000" data-max="300000">£200,000 - £300,000</td>
        </tr>
        <tr>
          <td class="company"  data-company="Centro" >Centro</td>
          <td class="contact" data-contact="Helen Bennett">Helen Bennett</td>
          <td class="range" data-min="100000" data-max="200000">£100,000 - £200,000</td>
        </tr>
        <tr>
          <td class="company"  data-company="Laughing">Laughing</td>
          <td class="contact" data-contact="Yoshi Tannamuri">Yoshi Tannamuri</td>
          <td class="range" data-min="200000" data-max="300000">£200,000 - £300,000</td>
        </tr>
        <tr>
          <td class="company"  data-company="Laughing">Laughing</td>
          <td data-contact="Giovanni Rovelli">Giovanni Rovelli</td>
          <td class="range" data-min="150000" data-max="250000">£150,000 - £250,000</td>
        </tr>
      </tbody>
    </table>
  
  
  </article>
  
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
  
  $('.filter').change(function(){
    filter_function();
  });

$('table tbody tr').show(); //intially all rows will be shown

function filter_function(){
  $('table tbody tr').hide(); //hide all rows
  
  var companyFlag = 0;
  var companyValue = $('#filter-company').val();
  var contactFlag = 0;
  var contactValue = $('#filter-contact').val();
   var rangeFlag = 0;
  var rangeValue = $('#filter-range').val();
   var rangeminValue = $('#filter-range').find(':selected').attr('data-min');
   var rangemaxValue = $('#filter-range').find(':selected').attr('data-max');
  
  //setting intial values and flags needed
  
 //traversing each row one by one
  $('table tbody tr').each(function() {  

  
    if(companyValue == 0){   //if no value then display row
    companyFlag = 1;
    }
    else if(companyValue == $(this).find('td.company').data('company')){ 
      companyFlag = 1;       //if value is same display row
    }
    else{
      companyFlag = 0;
    }
    
    
     if(contactValue == 0){
    contactFlag = 1;
    }
    else if(contactValue == $(this).find('td.contact').data('contact')){
      contactFlag = 1;
    }
    else{
      contactFlag = 0;
    }
    
    
    
     if(rangeValue == 0){
    rangeFlag = 1;
    }
  //condition to display rows for a range

    else if((rangeminValue <= $(this).find('td.range').data('min') && rangemaxValue >  $(this).find('td.range').data('min')) ||  (
      rangeminValue < $(this).find('td.range').data('max') &&
      rangemaxValue >= $(this).find('td.range').data('max'))){
      rangeFlag = 1;
    }
    else{
      rangeFlag = 0;
    }
     
      console.log(rangeminValue +' '+rangemaxValue);
      console.log($(this).find('td.range').data('min') +' '+$(this).find('td.range').data('max'));
    
    
   if(companyFlag && contactFlag && rangeFlag){
     $(this).show();  //displaying row which satisfies all conditions
   }
});
    
}
</script>
  <footer>
  <p>Footer</p>
</footer>
   </form>
 </body>
</html>
