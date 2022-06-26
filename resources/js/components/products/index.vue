<template>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Awesome Todo list</h4>
                            <div class="add-items d-flex">
                                <input type="text" v-model="todoAddTitle" class="form-control todo-list-input" placeholder="title">
                                <input type="text" v-model="todoAddDesc" class="form-control todo-list-input" placeholder="desc">
                                <button @click="addTodoEvent()" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                            </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse todo-list">
                                    <li :class="[{ 'completed' : item.status === '1' }]" v-for="item in hours" :key="item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input @change="changeStatus(item)" class="checkbox" type="checkbox" :checked="item.status === '1'" > {{ item.title }} {{ item.desc}} <i class="input-helper"></i>
                                            </label>
                                        </div>

                                        <i @click="editModalShow(item)" class="remove fa fa-edit"></i>
                                        <i @click="removeItem(item)" class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <editModal @updateTodoEvent="updateTodoEvent($event)" :todoClass="classUpdate" :todoItem="itemModalValue" v-show="editModal" @close-modal="editModal = false" />

</template>
<script>
    import editModal from "../modals/EditModal";

    export default {
        components: { editModal },
        data() {
            return {
                todoAddTitle: "",
                todoAddDesc: "",
                hours:[],
                editModal: false,
                itemModalValue: "",
                classUpdate :false
            }
        },
        methods:{
            async getTodo(){
               let response = await axios.get('/api/product')
                if(response.status == 200)
                {
                    this.hours = response.data
                }
            },
            async updateTodoEvent(item){
                let ItemDetail = item;
                await axios.post('/api/product/edit', { item })
                    .then((response) => {
                        console.log(response)
                    });
                this.classUpdate = true
            },
            async addTodoEvent(){
                let eventValueTitle = this.todoAddTitle;
                let eventValueDesc = this.todoAddDesc;
                await axios.post('api/product/add', {title: eventValueTitle, desc: eventValueDesc})
                    .then((response) => {
                        //console.log(response.data);
                        this.getTodo().push(response.data.data);
                    });
            },
            editModalShow(item){
                this.itemModalValue = item
                this.editModal= !this.editModal
            },
            async changeStatus(item){
                let status = item.status === "0" ? "1" : "0"
                await axios.post('api/product/change', { id: item.id, status: status } )
                    .then((response) => {
                        console.log(response)
                    });
            },
            async removeItem(index){
              let itemId = index.id
                await axios.post('api/product/destroy', { id:itemId } )
                    .then((response) => {
                        this.getTodo().splice(index, 1);
                    });
            }
        },
        mounted() {
            this.getTodo();
        },
    }
</script>
