<<<<<<< HEAD
import ActionBox from "../helper/actionbox.class.js";
import Object from '../object.class.js'
import Utility from "../helper/utility.class.js";

export default class StageThird {

    constructor(attribute) {
        this.attribute = attribute;
        this.actionbox = new ActionBox();
    }
  
    startDrawing(REF) {
      let that = REF;
      let classRef = this;

      let actionBox = this.actionbox.clear().get();

      // d3.select('[data-menu-item="vpm"]').classed('active', true);
      // d3.select('[data-menu-item="mvpc"]').classed('active', true);
  
      let actionText = actionBox
        .append("p")
        .attr("class", "text-uppercase text-sm actionbox-text")
        .text("");
  
      let actionBody = actionBox
        .append("div")
        .attr("class", "form-row actionbox-body");  
  
      let faceSelectbox = actionBody.append('div').attr('class','col-md-6')
      .append("select").attr('name','select-face').attr("class", "form-control form-control-sm text-sm");
      faceSelectbox.append('option').html('select Face');
  
      for (let i = 0; i < that.mapBoundariesCoords.length; i++) {
        let j = i < that.mapBoundariesCoords.length - 1 ? i + 1 : 0;
        let wallPointFirst = (i + 10).toString(36).toUpperCase();
        let wallPointSecond = (j + 10).toString(36).toUpperCase();
        faceSelectbox.append("option").attr("value", [
            that.mapBoundariesCoords[i],
            that.mapBoundariesCoords[j],
          ])
          .text(`Wall ${wallPointFirst} - ${wallPointSecond}`);
      }

      let gridSelectbox = actionBody.append('div').attr('class','col-md-6')
      .append("select").attr('name','select-grid').attr("class", "form-control form-control-sm text-sm").html(
        `
        <option value="8">8 Division</option>
        <option value="16" selected>16 Division</option>
        <option value="32">32 Division</option>
        `
      );
      // gridSelectbox.append("option").attr("value", 8).html('8 Division');
      // gridSelectbox.append("option").attr("value", 16).html('16 Division');
      // gridSelectbox.append("option").attr("value", 32).html('32 Division');

      let angleInputbox = actionBody.append('div').attr('class','col-md-12')
      .append("input").attr("class", "mt-2 form-control form-control-sm text-sm")
      .attr('type', 'number').attr('placeholder', 'Degree');

      let container = actionBox.append('div').attr('class', 'form-row justify-content-between p-2');

      let barchartContainer = container.append('div').attr('class', 'col-md-3 d-flex justify-content-center align-items-center border object-actions')
      .attr('data-action-object', 'barchart').attr('data-toggle', 'modal').attr('data-target', '#appModal')
      .style('flex-direction','column').style('height','42px').style('min-width','55px');
      let barchart = barchartContainer.append('img').attr('src', `${that.BASE_URL}assets/icons/barchart.svg`).attr('width', 20);
      barchartContainer.append('span').style('margin-top','1px').style('font-size','9px').text('barchart');

      let vpmContainer = container.append('div').attr('class', 'col-md-3 d-flex justify-content-center align-items-center border object-actions')
      .style('flex-direction','column').style('height','42px').style('min-width','55px');
      let vpm = vpmContainer.attr('data-action-object', `${that.BASE_URL}assets/icons/mvm.svg`).append('img').attr('src', `${that.BASE_URL}assets/icons/mvm.svg`).attr('width', 20);
      vpmContainer.append('span').style('margin-top','1px').style('font-size','9px').text('vpm');

      let mvmContainer = container.append('div').attr('class', 'col-md-3 d-flex justify-content-center align-items-center border object-actions')
      .style('flex-direction','column').style('height','42px').style('min-width','55px');
      let mvm = mvmContainer.attr('data-action-object', `${that.BASE_URL}assets/icons/vpm.svg`).append('img').attr('src', `${that.BASE_URL}assets/icons/vpm.svg`).attr('width', 20);
      mvmContainer.append('span').style('margin-top','1px').style('font-size','9px').text('mvpc');
  
      faceSelectbox.on("change", function() {
        let str = d3.select(this).node().value.split(',');
        let pointA = [parseInt(str[0]),parseInt(str[1])];
        let pointB = [parseInt(str[2]),parseInt(str[3])];

        that.faceCoords = [pointA, pointB];
        that.model.editFaceCoords(that.mapId, [pointA, pointB]);

        // that.start();
        that.assist.drawBackgroundGrid(that.firstLayer, that.centroid, that.faceCoords, that.division, that.angle);
        that.assist.drawMask({layer: that.firstLayer, points: that.mapBoundariesCoords, size: that.RECT_SIZE});
        that.assist.drawBoundaries({layer: that.firstLayer, points: that.mapBoundariesCoords});
        that.assist.drawBharamNabhi({layer: that.firstLayer, centroid: that.centroid});
        that.assist.drawDirectionLines(that.firstLayer, that.faceCoords, that.centroid, that.division, that.angle);
        that.assist.drawFacingLine(that.firstLayer, that.centroid, that.faceCoords);
        that.assist.drawGrid(that.firstLayer, that.centroid, that.faceCoords, that.screenBoundariesCoords, that.division, that.angle);

        that.screenPolygons = Utility.getIntersectionPoints(that.calNorthAngle(),that.centroid,that.screenBoundariesCoords, that.division);
        that.mapPolygonsArray = Utility.getIntersectionPoints(that.calNorthAngle(),that.centroid,that.mapBoundariesCoords, that.division);
        that.mapPolygonsAreaArray = Utility.getPolygonsArea(that.mapPolygonsArray);

        // ? DRAW BAR CHART
        that.modal.drawMap({areaArr: that.mapPolygonsAreaArray, division: that.division, dimension: that.distanceBetweenTwoPoints});
        

      })

      gridSelectbox.on("change", function() {
        let division = d3.select(this).property('value');
        that.division = division;
        
        // that.start();
        that.assist.drawBackgroundGrid(that.firstLayer, that.centroid, that.faceCoords, that.division, that.angle);
        that.assist.drawMask({layer: that.firstLayer, points: that.mapBoundariesCoords, size: that.RECT_SIZE});
        that.assist.drawBoundaries({layer: that.firstLayer, points: that.mapBoundariesCoords});
        that.assist.drawBharamNabhi({layer: that.firstLayer, centroid: that.centroid});
        that.assist.drawDirectionLines(that.firstLayer, that.faceCoords, that.centroid, that.division, that.angle);
        that.assist.drawFacingLine(that.firstLayer, that.centroid, that.faceCoords);
        that.assist.drawGrid(that.firstLayer, that.centroid, that.faceCoords, that.screenBoundariesCoords, that.division, that.angle);

        that.screenPolygons = Utility.getIntersectionPoints(that.calNorthAngle(),that.centroid,that.screenBoundariesCoords, that.division);
        that.mapPolygonsArray = Utility.getIntersectionPoints(that.calNorthAngle(),that.centroid,that.mapBoundariesCoords, that.division);
        that.mapPolygonsAreaArray = Utility.getPolygonsArea(that.mapPolygonsArray);

        // ? DRAW BAR CHART
        that.modal.drawMap({areaArr: that.mapPolygonsAreaArray, division: that.division, dimension: that.distanceBetweenTwoPoints});
      })

      angleInputbox.on("change", function() {
          let theta = (angleInputbox.property('value') == "") ? 0 : parseFloat(angleInputbox.property('value'));
          that.angle = -theta;

          // that.start();
          that.assist.drawBackgroundGrid(that.firstLayer, that.centroid, that.faceCoords, that.division, that.angle);
          that.assist.drawMask({layer: that.firstLayer, points: that.mapBoundariesCoords, size: that.RECT_SIZE});
          that.assist.drawBoundaries({layer: that.firstLayer, points: that.mapBoundariesCoords});
          that.assist.drawBharamNabhi({layer: that.firstLayer, centroid: that.centroid});
          that.assist.drawDirectionLines(that.firstLayer, that.faceCoords, that.centroid, that.division, that.angle);
          that.assist.drawFacingLine(that.firstLayer, that.centroid, that.faceCoords);
          that.assist.drawGrid(that.firstLayer, that.centroid, that.faceCoords, that.screenBoundariesCoords, that.division, that.angle);
          d3.select('.facing-degree').text(`${theta}°`)
  
          that.screenPolygons = Utility.getIntersectionPoints(that.calNorthAngle(),that.centroid,that.screenBoundariesCoords, that.division);
          that.mapPolygonsArray = Utility.getIntersectionPoints(that.calNorthAngle(),that.centroid,that.mapBoundariesCoords, that.division);
          that.mapPolygonsAreaArray = Utility.getPolygonsArea(that.mapPolygonsArray);
  
          // ? DRAW BAR CHART
          that.modal.drawMap({areaArr: that.mapPolygonsAreaArray, division: that.division, dimension: that.distanceBetweenTwoPoints});
      })

      vpm.on('click', function() {
        if(classRef.objectVpm == null || classRef.objectVpm == undefined) {
          d3.select('.properties-section.opacity').style('display','block');
          d3.select(this.parentNode).classed('active', true);
          let data = {
            src: '/vastuteq/assets/images/vpm.svg',
            width: 400,
            height: 400
          }
          classRef.objectVpm = new Object({
            layer: that.secondLayer,
            data: data,
            canvasSize: that.canvasSize,
            objectName: 'VPM',
            attribute: that.attribute
          });
        } else {
          d3.select(this.parentNode).classed('active', false);
          classRef.objectVpm.getObject().remove();
          classRef.objectVpm = null;

          (classRef.objectMvm != null && classRef.objectVpm != null) ? d3.select('.properties-section.opacity').style('display','none') : null;
        }  

      })

      mvm.on('click', function() {
        if(classRef.objectMvm == null || classRef.objectMvm == undefined) {
          d3.select('.properties-section.opacity').style('display','block');
          d3.select(this.parentNode).classed('active', true);
          let data = {
            src: '/vastuteq/assets/images/mvm.svg',
            width: 350,
            height: 350
          }
          classRef.objectMvm = new Object({
            layer: that.secondLayer,
            data: data,
            canvasSize: that.canvasSize,
            objectName: 'MVM',
            attribute: that.attribute
          });
        } else {
          d3.select(this.parentNode).classed('active', false);
          classRef.objectMvm.getObject().remove();
          classRef.objectMvm = null;

          (classRef.objectMvm != null && classRef.objectVpm != null) ? d3.select('.properties-section.opacity').style('display','none') : null;
          
        }

      })


      this.actionbox.show();
  
    }

=======
import ActionBox from '../helper/actionbox.class.js';
import Utility from '../helper/utility.class.js';

export default class StageThird {

    constructor({layer, className}) {
        
        /* 
            ?  L O C A L  V A R I A B L E S
        */

        this.layer = layer;
        this.className = className;

        this.actionbox = new ActionBox();

        this.dragging = false;
        this.drawing = false;
        this.disable = false;
        this.startPoint = [];
        this.points = [];
        this.g;

        // DRAGGER
        this.dragger = d3.drag()
        .on('drag', this.handleDrag)
        .on('start end', (d) => { this.dragging = false; });

        // this.undo();
        
    }

    startDrawing(REF) {

        // CLASS REFERENCE
        let that = this;

        this.layer.on("mousemove", function () {
            if(that.disable) return;
            if(!that.drawing) return;
    
            let g = d3.select(`g.${that.className}`);
            g.select('line').remove();
            let line = g.append('line')
            .attr('x1', that.startPoint[0])
            .attr('y1', that.startPoint[1])
            .attr('x2', d3.mouse(this)[0] + 2)
            .attr('y2', d3.mouse(this)[1])
            .attr('stroke', '#EF5350')
            .attr('stroke-width', 3);

        })

        this.layer.on("mouseup", function () {
            if(that.disable) return;
            if(that.dragging) return;
        
            that.drawing = true;

            //let closeCoord = Utility.closestCoord(REF.mapBoundariesCoords, d3.mouse(this));
            that.startPoint = [d3.mouse(this)[0], d3.mouse(this)[1]];
    
            if(that.layer.select(`g.${that.className}`).empty()) that.g = that.layer.append('g').attr('class', that.className);
    
            that.points.push(d3.mouse(this));
            that.g.select('polyline').remove();
            
            let polyline = that.g.append('polyline').attr('points', that.points)
            .style('fill', 'none').attr('stroke', '#EF5350').attr('stroke-width', 3);

            if(that.points.length == 2) {
                d3.select(`g.${that.className} line`).remove();
                that.disable = true; 
                that.end(REF); 
            }
            
        })
    }

    end(REF) {
        let that = REF;

        let actionBox = this.actionbox.clear().get();
        
        let actionText = actionBox.append('p')
        .attr('class','text-uppercase text-sm actionbox-text')
        .text('Select distance from p1 to p2');

        let actionBody = actionBox.append('div')
        .attr('class','form-row actionbox-body');

        this.distance = actionBody.append('div')
        .attr('class', 'col-md-6').append('input')
        .attr('type','text').attr('class', 'form-control form-control-sm text-sm')
        .attr('placeholder', 'Distance');

        this.unit = actionBody.append('div')
        .attr('class', 'col-md-6').append('select')
        .attr('type','text').attr('class', 'form-control form-control-sm text-sm');

        this.unit.append('option').attr('value',"0").html('Select Unit');
        this.unit.append('option').attr('class','text-uppercase text-sm').attr('value', 'meter').text('Meter');
        this.unit.append('option').attr('class','text-uppercase text-sm').attr('value', 'feet').text('Feet');
        this.unit.append('option').attr('class','text-uppercase text-sm').attr('value', 'inch').text('Inch');
        this.unit.append('option').attr('class','text-uppercase text-sm').attr('value', 'yard').text('Yard');

        let saveBtn = actionBody.append('div')
        .attr('class', 'col-md-12').append('button')
        .attr('class', 'mt-3 btn btn-outline-primary btn-block btn-sm text-sm text-uppercase')
        .text('save');


        this.actionbox.show();

        saveBtn.on("click", (e) => {
            console.log(this.distance.property("value"),this.unit.property("value") == "0");

            if((this.distance.property("value") == undefined || this.distance.property("value") == "")) {
                this.showToast("warning","Please enter distance");
            }
            else if((this.unit.property("value") == "" || this.unit.property("value") == "0")){
                this.showToast("warning","Please enter unit");
            } else {

            this.actionbox.clear().hide();
            this.remove();

            let scale = parseFloat(this.distance.property("value"));
            let unitM = this.unit.property("value");

            let distance = Math.sqrt(Math.pow(this.points[0][0] - this.points[1][0], 2) + Math.pow(this.points[0][1] - this.points[1][1], 2));

            // console.log(this.points,scale,unitM, distance);
            
            that.distanceBetweenTwoPoints = {unit:unitM, distance:distance, scale:scale};

            that._stage = 4;
            that.model.editStage(that.mapId, 4);
            that.model.editDimension(that.mapId, {unit:unitM, distance:distance, scale:scale});
            
            this.remove();
            that.start();

            }
        })

    }

    undo() {

        document.addEventListener('keydown', (event) => {
            if(this.polygonClosed = true && this.points.length < 0) return false;
            if (event.ctrlKey && event.key === 'z') {
              this.points.pop();
              this.startPoint = this.points[this.points.length-1];
              this.g.select('polyline').remove();
              this.g.append('polyline').attr('points', this.points)
              .style('fill', 'none').attr('stroke', '#EF5350').attr('stroke-width','3');
              this.g.selectAll('circle:last-of-type').remove();
            }
            else if (event.metaKey && event.key === 'z'){
              this.points.pop();
              this.startPoint = this.points[this.points.length-1];
              this.g.select('polyline').remove();
              this.g.append('polyline').attr('points', this.points)
              .style('fill', 'none').attr('stroke', '#EF5350').attr('stroke-width','3');
              this.g.selectAll('circle:last-of-type').remove();
            }
        });
    }

    showToast(heading, msg, type="warning") {
        let toastbox = d3.select('#appToast');
        toastbox.select('.modal-title').html(heading)
        .classed(`text-${type}`, true);
        toastbox.select('.modal-body').html(msg);
        toastbox.select('.modal-footer').style('display', 'none');
        $('#appToast').modal('show');
      }
    
    hideToast() {
        $('#appToast').modal('hide');
    }

    remove() {
        this.layer.select(`g.${this.className}`).remove();
    }
>>>>>>> d6d84c463f9d83b850f422513dc83f8e30cdc93a
}