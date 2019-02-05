<?php


/**
 * CLAS RENDER
 */
class Render
{
	private $label;
	private $name = "Label";
	private $type = "text";	
	private $required = "required";
	private $placeholder = "";
	private $value = "";
	private $option = [];
	private $hideAdd = false;
	private $hideEdit = false;
	private $method;
	private $attr;


	public function selected($var1,$var2) {
        if($var1 == $var2){
        	return 'selected';
        }
	}
	
	public static function selected_1($var1,$var2) {
        if($var1 == $var2){
        	return 'selected="selected"';
        }
    }

	/**
	 * @param atributes = array
	 * @param data = array . if null = method add, if array = method edit
	 */
    public static function form($atributes,$data = null){	
		$self = new Render;					
		$self->method = $data == null ? 'add' : 'edit';
		foreach ($atributes as $key => $value) {
			$self->{$key} = $value;
		}	
		if($self->type == "text" || $self->type == "email" || $self->type == "number"){
			if(($self->method == 'add' && $self->hideAdd == false) || ($self->method == 'edit' && $self->hideEdit == false)){
				return $self->input($data);
			}
		}else if($self->type == "hidden"){
			return $self->hidden($data);
		}else if($self->type == "password"){
			return $self->password();
		}else if($self->type == "select"){
			if(($self->method == 'add' && $self->hideAdd == false) || ($self->method == 'edit' && $self->hideEdit == false)){
				return $self->select($data);
			}
		}else if($self->type == "datepicker"){
			if(($self->method == 'add' && $self->hideAdd == false) || ($self->method == 'edit' && $self->hideEdit == false)){
				return $self->datepicker($data);
			}
		}else if($self->type == "textarea"){
			if(($self->method == 'add' && $self->hideAdd == false) || ($self->method == 'edit' && $self->hideEdit == false)){
				return $self->textarea($data);
			}
		}else if($self->type == "ckeditor"){
			if(($self->method == 'add' && $self->hideAdd == false) || ($self->method == 'edit' && $self->hideEdit == false)){
				return $self->ckeditor($data);
			}
		}else if($self->type == "map"){
			if(($self->method == 'add' && $self->hideAdd == false) || ($self->method == 'edit' && $self->hideEdit == false)){
				return $self->map($data);
			}
		}else if($self->type == "file"){
			if(($self->method == 'add' && $self->hideAdd == false) || ($self->method == 'edit' && $self->hideEdit == false)){
				return $self->file($data);
			}
		}
	}
	
	
    public function input($data){	
		// dd($data);
		$this->required = ($this->required == "required") ? "required='required'" : "";
		if($data == null){
			if($this->value == ""){
				$value = '';
			}else{
				$value = $this->value;
			}
		}else{
			$value = $data->{$this->name};
		}

        return "
			<div class='form-group'>
				<label for=\"$this->name\">$this->label</label>
				<input type=\"$this->type\" $this->required id=\"$this->name\" name=\"$this->name\" class=\"form-control\" placeholder=\"$this->placeholder\" value=\"".$value."\" $this->attr>    	
			</div>
        ";
	}

	public function file($data){	
		// dd($data);
		$this->required = ($this->required == "required") ? "required='required'" : "";
		if($data == null){
			if($this->value == ""){
				$value = '';
			}else{
				$value = $this->value;
			}
		}else{
			$value = $data->{$this->name};
		}

        return "
			<div class='form-group'>
				<label for=\"$this->name\">$this->label</label>
				<input type=\"$this->type\" $this->required id=\"$this->name\" name=\"$this->name\" class=\"\" placeholder=\"$this->placeholder\" value=\"".$value."\">    	
			</div>
        ";
	}

	public function textarea($data){	
		// dd($data);
		$this->required = ($this->required == "required") ? "required='required'" : "";
		if($data == null){
			if($this->value == ""){
				$value = '';
			}else{
				$value = $this->value;
			}
		}else{
			$value = $data->{$this->name};
		}

        return "
			<div class='form-group'>
				<label for=\"$this->name\">$this->label</label>
				<textarea ' type=\"$this->type\" $this->required id=\"$this->name\" name=\"$this->name\" class=\"form-control\">$value</textarea>    	
			</div>
        ";
	}

	public function ckeditor($data){	
		// dd($data);
		$this->required = ($this->required == "required") ? "required='required'" : "";
		if($data == null){
			if($this->value == ""){
				$value = '';
			}else{
				$value = $this->value;
			}
		}else{
			$value = $data->{$this->name};
		}

        return "
			<div class='form-group'>
				<label for=\"$this->name\">$this->label</label>
				<textarea id='ckeditor' type=\"$this->type\" $this->required id=\"$this->name\" name=\"$this->name\" class=\"form-control ckeditor\">$value</textarea>    	
			</div>
        ";
	}

	public function map($data){	
		// dd($data);
		$this->required = ($this->required == "required") ? "required='required'" : "";
		if($data == null){
			if($this->value == ""){
				$value = '';
			}else{
				$value = $this->value;
			}
		}else{
			$value = $data->{$this->name};
		}

        return "
			<div class='form-group'>							
				<label for=\"$this->name\">$this->label</label>
				<div id='google_map' style='height:400px;'></div>
				<input type='hidden' readonly name='lat' class='lat col-sm-6'/>
				<input type='hidden' readonly name='lng' class='lng col-sm-6'/>    	
			</div>
        ";
	}

	public function hidden($data){	
		// dd($data);
		$this->required = ($this->required == "required") ? "required='required'" : "";
		if($data == null){
			if($this->value == ""){
				$value = '';
			}else{
				$value = $this->value;
			}
		}else{
			$value = $data->{$this->name};
		}

        return "							
			<input type=\"hidden\" $this->required id=\"$this->name\" name=\"$this->name\" class=\"form-control\" placeholder=\"$this->placeholder\" value=\"".$value."\">    	
			
        ";
	}
	

	public function password(){
		if($this->method == 'add'){
			$this->required = ($this->required == "required") ? "required='required'" : ""; 
		} else{
			$this->required = ''; 
			$this->placeholder = "(Opsional)";
		}
        return "
        <div class='form-group'>
            <label for=\"$this->name\">$this->label</label>
    	    <input type=\"$this->type\" $this->required id=\"$this->name\" name=\"$this->name\" class=\"form-control\" placeholder=\"$this->placeholder\" value=\"$this->value\">    	
		</div>
		<div class='form-group'>
            <label for=\"$this->name"."_confirmation\">Ulangi $this->label</label>
    	    <input type=\"$this->type\" $this->required id=\"$this->name"."_confirmation\" name=\"$this->name"."_confirmation\" class=\"form-control\" placeholder=\"$this->placeholder\" value=\"$this->value\">    	
        </div>
        ";
	}
	
	public function datepicker($data){	
    	// dd($data);
		$this->required = ($this->required == "required") ? "required='required'" : "";
		if($data == null){
			$value = '';
		}else{
			$value = $data->{$this->name};
		}

        return "
			<div class='form-group'>
				<label for=\"$this->name\">$this->label</label>
				<div class='input-group date'>
					<div class='input-group-addon'>
						<i class='fa fa-calendar'></i>
					</div>
					<input type=\"$this->type\" $this->required id=\"$this->name\" name=\"$this->name\" class=\"form-control pull-right datepicker\" placeholder=\"$this->placeholder\" value=\"".$value."\">    	
				</div>
			</div>
        ";    	
	}	
	
	public function select($data){
		$this->required = ($this->required == "required") ? "required='required'" : "";
		$opt = 	(object) $this->option;	

		if($data == null){
			$value = '';
		}else{
			$value = $data->{$this->name};
		}

		$option = '';
		foreach ($opt as $list) {			
			$option .= "<option ".$this->selected($value,$list['value'])." value='$list[value]'>$list[name]</option>";
		} 
		if($this->attr == 'multiple'){
			$select = "<select name=\"$this->name[]\" $this->required id=\"$this->name\" class=\"form-control\" $this->attr >";
		}else{
			$select = "<select name='$this->name' $this->required id=\"$this->name\" class=\"form-control\" $this->attr >";
		}
        return "
			<div class='form-group'>
				<label for=\"$this->name\">$this->label</label>	
				$select		
					$option
				</select>   	
			</div>
        ";
	}
	
	
	


    public function selectbox($id,$tipe_form,$catatan_text,$option,$value_select = "",$name=""){
    	if($catatan_text != ""){
			$help = "<span class=\"m-form__help\">$catatan_text</span>";
		}else{
			$help = "";
		}
        $name = $name != "" ? $name : "formulir";
        $selected = $value_select == "" ? "selected" : "";
    	$opt = "<option value='' selected='$selected'>-Pilih-</option>";
    	foreach ($option as $key => $value) {
    		$opt .= "<option value='$value->value' ".GlobalHelper::selected($value->value,$value_select)." >$value->value</option>";
		}
		
        return "<select name=\"".$name."[$id]\" id=\"formulir_$id\" class=\"form-control m-input\">$opt</select>$help";
        
	}

	public static function access($role){
		$condition = false;
		foreach ($role as $key => $value) {
			if($_SESSION['role'] == $value){
				$condition = true;
			}
		}

		return $condition;
	}
	
	
	
}
?>
