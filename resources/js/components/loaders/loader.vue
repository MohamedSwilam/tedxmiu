<template>
	<!--<circular-loader></circular-loader>-->
	 <bounce-loader></bounce-loader> 
</template>



<style>
/***********************************
START CUBIC LOADER
***********************************/
.loader-container{
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: white;
    z-index: 100 !important;
}

.sk-cube-grid {
    width: 70px;
    height: 70px;
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    margin: auto;
    margin-top: -50px;
}

.sk-cube-grid .sk-cube {
    width: 33%;
    height: 33%;
    background-color: #333;
    float: left;
    -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
    animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
}
.sk-cube-grid .sk-cube1 {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s; }
.sk-cube-grid .sk-cube2 {
    -webkit-animation-delay: 0.3s;
    animation-delay: 0.3s; }
.sk-cube-grid .sk-cube3 {
    -webkit-animation-delay: 0.4s;
    animation-delay: 0.4s; }
.sk-cube-grid .sk-cube4 {
    -webkit-animation-delay: 0.1s;
    animation-delay: 0.1s; }
.sk-cube-grid .sk-cube5 {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s; }
.sk-cube-grid .sk-cube6 {
    -webkit-animation-delay: 0.3s;
    animation-delay: 0.3s; }
.sk-cube-grid .sk-cube7 {
    -webkit-animation-delay: 0s;
    animation-delay: 0s; }
.sk-cube-grid .sk-cube8 {
    -webkit-animation-delay: 0.1s;
    animation-delay: 0.1s; }
.sk-cube-grid .sk-cube9 {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s; }

@-webkit-keyframes sk-cubeGridScaleDelay {
    0%, 70%, 100% {
        -webkit-transform: scale3D(1, 1, 1);
        transform: scale3D(1, 1, 1);
    } 35% {
          -webkit-transform: scale3D(0, 0, 1);
          transform: scale3D(0, 0, 1);
      }
}

@keyframes sk-cubeGridScaleDelay {
    0%, 70%, 100% {
        -webkit-transform: scale3D(1, 1, 1);
        transform: scale3D(1, 1, 1);
    } 35% {
          -webkit-transform: scale3D(0, 0, 1);
          transform: scale3D(0, 0, 1);
      }
}
/***********************************
END CUBIC LOADER
***********************************/









</style>