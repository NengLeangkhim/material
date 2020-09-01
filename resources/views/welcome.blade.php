    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"><br>
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #d42931;">
                          <h3 class="card-title">{{ $dept[0]->name??'' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="row" style="padding: 1%;">
                            <div class="col-md-12" id="row_welcome"></div>
                            <div class="col-md-12" style="height: auto;text-align: center;">
                                <img id="img_profile_company" src="../images/turbotech-text.png">
                            </div>
                            <div class="col-md-3" style="position: relative">
                                <div class="card" style="padding: 3%;">
                                    <img class="profile-pic" src="<?php echo $head[0]->image??"/storage/avatar7.png";?>" style="width:100%" id='image_'>
                                    {{-- <p>{{ $head[0]->phone??'' }}</p> --}}
                                    <table style="width:100%">
                                        <tr>
                                          <td>Name</td>
                                          <td>: {{ $head[0]->name??'' }}</td>
                                        </tr>
                                        <tr>
                                          <td>Position</td>
                                          <td>: {{ $head[0]->ma_position??'' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td>: {{ $head[0]->contact??'' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <div class="card" style="padding: 3%;">
                                    <img class="profile-pic" src="<?php echo $uself[0]->image??"/storage/avatar7.png";?>" style="width:100%" id='image_'>
                                    {{-- <p>{{ $uself[0]->contact??'' }}</p> --}}
                                    <table style="width:100%">
                                        <tr>
                                          <td>Name</td>
                                          <td>: {{ $uself[0]->name??'' }}</td>
                                        </tr>
                                        <tr>
                                          <td>Position</td>
                                          <td>: {{ $uself[0]->ma_position??'' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td>: {{ $uself[0]->contact??'' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // alert();
        img_exist();
        //// function Canvas animation ////
        // particle.min.js hosted on GitHub
        // Scroll down for initialisation code

        !function(a){var b="object"==typeof self&&self.self===self&&self||"object"==typeof global&&global.global===global&&global;"function"==typeof define&&define.amd?define(["exports"],function(c){b.ParticleNetwork=a(b,c)}):"object"==typeof module&&module.exports?module.exports=a(b,{}):b.ParticleNetwork=a(b,{})}(function(a,b){var c=function(a){this.canvas=a.canvas,this.g=a.g,this.particleColor=a.options.particleColor,this.x=Math.random()*this.canvas.width,this.y=Math.random()*this.canvas.height,this.velocity={x:(Math.random()-.5)*a.options.velocity,y:(Math.random()-.5)*a.options.velocity}};return c.prototype.update=function(){(this.x>this.canvas.width+20||this.x<-20)&&(this.velocity.x=-this.velocity.x),(this.y>this.canvas.height+20||this.y<-20)&&(this.velocity.y=-this.velocity.y),this.x+=this.velocity.x,this.y+=this.velocity.y},c.prototype.h=function(){this.g.beginPath(),this.g.fillStyle=this.particleColor,this.g.globalAlpha=.7,this.g.arc(this.x,this.y,1.5,0,2*Math.PI),this.g.fill()},b=function(a,b){this.i=a,this.i.size={width:this.i.offsetWidth,height:this.i.offsetHeight},b=void 0!==b?b:{},this.options={particleColor:void 0!==b.particleColor?b.particleColor:"#fff",background:void 0!==b.background?b.background:"#ffffff",interactive:void 0!==b.interactive?b.interactive:!0,velocity:this.setVelocity(b.speed),density:this.j(b.density)},this.init()},b.prototype.init=function(){if(this.k=document.createElement("div"),this.i.appendChild(this.k),this.l(this.k,{position:"relative",top:0,left:0,bottom:0,right:0,"z-index":1}),/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.background))this.l(this.k,{background:this.options.background});else{if(!/\.(gif|jpg|jpeg|tiff|png)$/i.test(this.options.background))return console.error("Please specify a valid background image or hexadecimal color"),!1;this.l(this.k,{background:'url("'+this.options.background+'") no-repeat center',"background-size":"cover"})}if(!/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.particleColor))return console.error("Please specify a valid particleColor hexadecimal color"),!1;this.canvas=document.createElement("canvas"),this.i.appendChild(this.canvas),this.g=this.canvas.getContext("2d"),this.canvas.width=this.i.size.width,this.canvas.height=this.i.size.height,this.l(this.i,{position:"fixed"}),this.l(this.canvas,{"z-index":"20",position:"absolute"}),window.addEventListener("resize",function(){return this.i.offsetWidth===this.i.size.width&&this.i.offsetHeight===this.i.size.height?!1:(this.canvas.width=this.i.size.width=this.i.offsetWidth,this.canvas.height=this.i.size.height=this.i.offsetHeight,clearTimeout(this.m),void(this.m=setTimeout(function(){this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&this.o.push(this.p),requestAnimationFrame(this.update.bind(this))}.bind(this),500)))}.bind(this)),this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&(this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p),this.canvas.addEventListener("mousemove",function(a){this.p.x=a.clientX-this.canvas.offsetLeft,this.p.y=a.clientY-this.canvas.offsetTop}.bind(this)),this.canvas.addEventListener("mouseup",function(a){this.p.velocity={x:(Math.random()-.5)*this.options.velocity,y:(Math.random()-.5)*this.options.velocity},this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p)}.bind(this))),requestAnimationFrame(this.update.bind(this))},b.prototype.update=function(){this.g.clearRect(0,0,this.canvas.width,this.canvas.height),this.g.globalAlpha=1;for(var a=0;a<this.o.length;a++){this.o[a].update(),this.o[a].h();for(var b=this.o.length-1;b>a;b--){var c=Math.sqrt(Math.pow(this.o[a].x-this.o[b].x,2)+Math.pow(this.o[a].y-this.o[b].y,2));c>120||(this.g.beginPath(),this.g.strokeStyle=this.options.particleColor,this.g.globalAlpha=(120-c)/120,this.g.lineWidth=.7,this.g.moveTo(this.o[a].x,this.o[a].y),this.g.lineTo(this.o[b].x,this.o[b].y),this.g.stroke())}}0!==this.options.velocity&&requestAnimationFrame(this.update.bind(this))},b.prototype.setVelocity=function(a){return"fast"===a?1:"slow"===a?.33:"none"===a?0:.66},b.prototype.j=function(a){return"high"===a?5e3:"low"===a?2e4:isNaN(parseInt(a,10))?1e4:a},b.prototype.l=function(a,b){for(var c in b)a.style[c]=b[c]},b});

        // Initialisation

        var canvasDiv = document.getElementById('row_welcome');
        var options = {
        particleColor: '#007bff',
        interactive: true,
        speed: 'fast',
        density: 'high'
        };
        var particleCanvas = new ParticleNetwork(canvasDiv, options);
    </script>
    