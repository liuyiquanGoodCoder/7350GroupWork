<template>
    <div class="content-wrapper" v-if="reload">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12" v-if="manageBook=='show'">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title" style="display: inline-block;">Service Table</h3>
                        <a class="btn btn-info" href="#" @click="addBook" style="float: right;">Add Service</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>Service ID</th>
                            <th>Price</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Details</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(item,index) in bookInformation">
                              <td>{{item.from_seller_id}}</td>
                              <td>{{item.price}}</td>
                              <td>{{item.created_at}}</td>
                              <td>{{item.status}}</td>
                              <td>{{item.details}}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
              <!-- /.card -->
            </div>
                <!-- /.col-md-6 -->
              <div class="col-12" v-if="manageBook=='create'">
                <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Book</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Seller</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Seller" v-model="from_seller_id">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Price</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter price" v-model="price">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Created At</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter created_at" v-model="created_at">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Status</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter status" v-model="status">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Details</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter details" v-model="details">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" @click="submit">Submit</button>
                        <button type="submit" class="btn btn-danger" @click="cancel">Cancel</button>
                        </div>
                        
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer" style="display: none;">
                        
                      </div>
                    
                  </div>                       
                
              </div>
          </div>
          <!-- /.col-md-6 -->
            
          
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
    data() {
        return {
            userName:"",
            token:"",
            bookInformation:{},
            manageBook:"show",
            reload:true,
            //
            id:"",
            user_id:"",
            from_seller_id:"",
            details:"",
            price:"",
            created_at:"",
            updated_at:"",
            project_id:"",
            status:""



        }
    },
    mounted(){
        let userInfo = document.cookie.split(";");
        //let token = userInfo[0].XSRF-TOKEN;
        let userFunction = {};
        if(userInfo[0].split("|")[2]){
           userFunction = userInfo[0].split("|");
          
        }else{
          userFunction = userInfo[1].split("|");
        }
        let role = userFunction[1];
        let $this = this;
        this.userName = userFunction[0];
        this.token = userFunction[2];
        axios.get('http://jwt.test/api/showservice?token='+this.token)
          .then(function (response) {
            console.log(response);
            if(response.data){
                $this.bookInformation = response.data;
                //console.log($this.bookInformation);
                $(function () {
                  $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                  });
              });
            }
          })
          .catch(function (error) {
            console.log(error);
        });
    
    },
    methods:{
      showBook(){
        let $this = this;
        this.reload = false;
        axios.get('http://jwt.test/api/showservice?token='+this.token)
          .then(function (response) {
            console.log(response);
            if(response.data){
                $this.bookInformation = response.data;
                //console.log($this.bookInformation);
                $this.reload = true;
                $(function () {
                  $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                  });
              });
            }
          })
          .catch(function (error) {
            console.log(error);
        });
      },
      addBook(){
        this.manageBook = 'create';
      },
      cancel(){
        this.manageBook = 'show';
      },
      submit(){
        let $this = this;
        axios.post('http://jwt.test/api/payservice',{
              "id":$this.from_seller_id,
              "from_seller_id": $this.from_seller_id,
              "details": $this.details,
              "price": $this.price,
              "created_at": $this.created_at,
              "status": $this.status,
              "token": $this.token
          })
          .then(function (response) {
            if(response.data.success == true){
                $this.manageBook = "show";
                $this.showBook(); 
            }
          })
          .catch(function (error) {
            console.log(error);
        });
      },
      updateShow(item){
        let $this = this;
        $this.bname=item.bname;
        $this.author=item.author;
        $this.publishYear=item.pub_year;
        $this.publisher=item.publisher;
        $this.quantity=item.quantity;
        $this.price=item.price;
        $this.isbn=item.ISBN;
        $this.img_s=item.img_s;
        $this.img_m=item.img_m;
        $this.img_l=item.img_m;
        $this.id = item.id;
        $this.manageBook = "update";
      },
      update(){
        let $this = this;
        axios.post('http://jwt.test/api/updatebooks',{
              "id": $this.id,
              "bname": $this.bname,
              "ISBN": $this.isbn,
              "author": $this.author,
              "role": "0",
              "pub_year": $this.publishYear,
              "publisher": $this.publisher,
              "img_s": $this.img_s,
              "img_m": $this.img_m,
              "img_l": $this.img_l,
              "price": $this.price,
              "quantity": $this.quantity,
              "token": $this.token
          })
          .then(function (response) {
            if(response.status != '200'){
              
            }else if(response.data.success == true){
                $this.manageBook = "show";
                $this.showBook();              
            }
          })
          .catch(function (error) {
            console.log(error);
        });
      },
      deleteBook(id){
        let $this = this;
        axios.post('http://jwt.test/api/deletebooks',{
              "id":id,
              "token": $this.token
          })
          .then(function (response) {
           if(response.data.success == true){
                $this.manageBook = "show";
                $this.showBook(); 
            }
          })
          .catch(function (error) {
            console.log(error);
        });
      },


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
  table{
   font-size: 15px; 
  }
</style>
