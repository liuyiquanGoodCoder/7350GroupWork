<template>
    <div>
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="btn btn-default btn-flat" href="/" style="font-size: 12px;">Sign Out
        </a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/library.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MY BookHub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img v-bind:src="userImage" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{userName}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
           <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview" v-if="seller">
            <ul>
               <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(1)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                  Store Information
                  </p>
                </a>
              </li>

             <li class="nav-item">
              <a href="#" class="nav-link" @click="showContent(2)">
                <i class="nav-icon fa fa-th"></i>
                <p>
                Books Management
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(3)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Services
                  </p>
                </a>
              </li>
               <!-- <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(4)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    New Orders
                  </p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(5)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Business
                  </p>
                </a>
              </li>
              
            </ul>
          </li>

           <li class="nav-item" v-if="finance">
            <ul>
              
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(6)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Income Records
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(7)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Expenditure Records
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(8)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Business
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(9)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Payroll
                  </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item" v-if="marking">
            <ul>
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(10)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Store management
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(11)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Projects Management
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(12)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Project Records
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(13)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Business
                  </p>
                </a>
              </li>
            </ul>
           </li>

          <li class="nav-item" v-if="human">
            <ul>
              
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(14)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Employee Information
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(15)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Training
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" @click="showContent(16)">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Resumes
                  </p>
                </a>
              </li>
            </ul>
          </li>      
        </ul>
      </nav>
  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </div>
</template>

<script>
export default {
    data() {
        return {
            userName:"",
            seller:false,
            finance:false,
            marking:false,
            human:false,
            userImage:""
        }
    },
    mounted(){
        let userInfo = document.cookie.split(";");
        //let token = userInfo[0].XSRF-TOKEN;
        let userFunction = userInfo[0].split("|");
        let role = userFunction[1];
        this.userName = userFunction[0];
        switch (role){
            case "1":
                this.seller = true;
                this.userImage="dist/img/user1-128x128.jpg"
                break;
            case "2": 
                this.finance = true;
                this.userImage="dist/img/user2-160x160.jpg"
                break;
            case "3": 
                this.marking = true;
                this.userImage="dist/img/user3-128x128.jpg"
                break;
            case "4": 
                this.human = true;
                this.userImage="dist/img/user4-128x128.jpg"
                break;


        }
    },
    methods:{
      showContent(url){
        let $this = this;
        switch(url){
            
              case 1:
                  $this.$emit('url','store');
                  break;
              case 2: 
                  $this.$emit('url','book');
                  break;
              case 3: 
                  $this.$emit('url','service');
                  break;
              case 4: 
                  $this.$emit('url','newOrder');
                  break;
              case 5: 
                  $this.$emit('url','sellerbusiness');
                  break;
              case 6: 
                  $this.$emit('url','income');
                  break;
              case 7: 
                  $this.$emit('url','expenditure');
                  break;
              case 8: 
                  $this.$emit('url','allbusiness');
                  break;
              case 9: 
                  $this.$emit('url','payroll');
                  break;
              case 10: 
                  $this.$emit('url','storemanagement');
                  break;
              case 11: 
                  $this.$emit('url','projectmanagement');
                  break;
              case 12: 
                  $this.$emit('url','projectrecord');
                  break;
              case 13: 
                  $this.$emit('url','allbusiness');
                  break;
              case 14: 
                  $this.$emit('url','employee');
                  break;
              case 15: 
                  $this.$emit('url','training');
                  break;
              case 16: 
                  $this.$emit('url','resumes');
                  break;

          }
        }
      } 
    

}
</script>

<style scoped>
  a{
    font-size: 15px;
  }
  p{
    font-size: 15px;
  }

  
</style>
