import Model from './helper/model.class.js';
import saveUserData from './helper/saveUserData.class.js';

let model = new Model();

let maps = model.getMaps();

localStorage.hasOwnProperty('selectedMapId') == true ? localStorage.removeItem("selectedMapId") : null;

let mainArea = d3.select('#mapsContainer');

for (let i in maps) {
	var container = mainArea.append('div').attr('class', 'col-lg-4 col-md-6 col-sm-12 mb-4')
	var cardContainer = container.append('div').attr('class', 'card rounded bubbly-button p-1')
		.attr('data-map-id', maps[i].id);
	cardContainer.append('img').attr('class', 'card-img-top').attr('src', maps[i].imageData.src)
	var cardBody = cardContainer.append('div').attr('class', 'card-body border-top border-thick')
	cardBody.append('div').attr('class', 'project-name card-text').text(`Property ID: ${maps[i].id}`)
	cardBody.append('div').attr('class', 'last-update card-text').text('Last edited 19 hours ago')

}

d3.selectAll('[data-map-id]').on('click', function () {
	let id = d3.select(this).attr('data-map-id');
	let selectedMapId = localStorage.getItem("selectedMapId") || 0;
	localStorage.setItem("selectedMapId", id);
	//console.log("id: ",id);

	window.location.href = base_url+'/Main/draw';
})




$(document).ready(function () {


	var $toggleButton = $('.toggle-button'),
		$menuWrap = $('.menu-wrap'),
		$sidebarArrow = $('.sidebar-menu-arrow');

	// Hamburger button

	$toggleButton.on('click', function () {
		$(this).toggleClass('button-open');
		$menuWrap.toggleClass('menu-show');
	});

	// Sidebar navigation arrows

	$sidebarArrow.click(function () {
		$(this).next().slideToggle(300);
	});



	// SAVE INFO BUTTON
	// var $saveInfoButton = $('button .save-info');

	let propertyInfoData = [getPropertyInfoItem()];
	function getPropertyInfoItem(name = '', category = '', type = '', address = '') {
		return { name, category, type, address };
	}
	function inputChangeHandler(e) {
		let { name, value } = e.target;
		let key = $(e.target).data('key');
		propertyInfoData[key][name] = value;
		//console.log(propertyInfoData)
	}
	function loadPropertyInfo() {
		$('#propertyForm').empty();
		for (let key in propertyInfoData) {
			let html = $(`<div> 
		<div class="form-row"><h5 class="mb-4 col-md-11">Property Info</h5>
		<button type="button" class="close col-md-1 minus" value='${propertyInfoData[key]}'>
              <span aria-hidden="true">&minus;</span>
			</button>
			</div>
		<div class="form-row">
		  <div class="form-group col-md-4">
			<label for="inputEmail4">Name</label>
			<input
			  type="text"
			  class="form-control form-control-sm"
			  name="name"
			  value='${propertyInfoData[key].name}'
			  placeholder="property name"
			/>
		  </div>
		  <div class="form-group col-md-4">
			<label for="inputEmail4">Category</label>
			<input
			  type="text"
			  class="form-control form-control-sm"
			  name="category"
			  value='${propertyInfoData[key].category}'
			  placeholder="property category"
			/>
		  </div>
		  <div class="form-group col-md-4">
			<label for="inputEmail4">Type</label>
			<input
			  type="text"
			  class="form-control form-control-sm"
			  name="type"
			  value='${propertyInfoData[key].type}'
			  placeholder="property type"
			/>
		  </div>
		</div>
		<div class="form-row">		  
		  <div class="form-group col-md-6">
			<label for="inputAddress">Address</label>
			<input
			  type="text"
			  class="form-control form-control-sm"
			  name="address"
			  value='${propertyInfoData[key].address}'
			  placeholder="property address"
			/>
		  </div>
		</div>
		</div>`);

			let inputName = html.find('[name=name]');
			inputName.data('key', key);
			inputName.keyup(inputChangeHandler);

			let inputCategory = html.find('[name=category]');
			inputCategory.data('key', key);
			inputCategory.keyup(inputChangeHandler);

			let inputType = html.find('[name=type]');
			inputType.data('key', key);
			inputType.keyup(inputChangeHandler);

			// let inputOwner = html.find('[name=owner]');
			// inputOwner.data('key', key);
			// inputOwner.keyup(inputChangeHandler);

			let inputAddress = html.find('[name=address]');
			inputAddress.data('key', key);
			inputAddress.keyup(inputChangeHandler);

			let rButton = html.find('.minus');
			inputAddress.data('key', key);
			// inputAddress.keyup(inputChangeHandler);


			//console.log(inputAddress)

			$('#propertyForm').append(html)
		}
	}

	$('.save-info').on('click', function () {
		console.log(propertyInfoData)

	})




	//Add More Property functionality
	$('#addMore').on('click', function () {
		propertyInfoData.push(getPropertyInfoItem());
		loadPropertyInfo();
	})
	function remove(array, key, value) {
		const index = array.findIndex(obj => obj[key] === value);
		return index >= 0 ? [
			...array.slice(0, index),
			...array.slice(index + 1)
		] : array;
	}
	$('#propertyForm').on('click', '.minus', function () {
		console.log($(this).attr('value'))
		const newData = remove(propertyInfoData, "value", $(this).attr('value'));
		$(this).parent().parent().remove()
	})
	loadPropertyInfo();

	$('#clientInfo').submit(function (e) {
		e.preventDefault;
		let mNo = $("[name='mNumber']").val();
		if (mNo.trim().length != 10) {
			showAlert('Mobile No. should be 10 digit', 'danger')
			return false;
		} else {
			return true
		}

	})

	$('#category').change(function () {
		let value = $('option:selected').val()
		let id = $('option:selected').attr('tId')
		if (value == '') {
			showAlert('Please select any category')
		} else {
			var formData = new FormData();
			formData.append('id', id);
			var url = base_url + "/Main/getType";
			

			AjaxPost(formData, url, typeSuccess, AjaxError);
		}
	});
	function typeSuccess(content,targetTextarea) {
		var result = JSON.parse(content);
		console.log(result)
		if (result != "") {
			let html = ''
			for(let i in result){
				html += `<option value="${result[i]['type']}">${result[i]['type']}</option>`
			}
			$('#type').html(html)
		
		} else {
			showAlert(result.error, 'danger');		
		}
	}

});



