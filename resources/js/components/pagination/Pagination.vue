<template>
<!--    <ul class="pagination pagination-rounded justify-content-end mb-0 mt-2">
        <li class="page-item" v-if="pagination.current_page > 1">
            <a href="javascript:void(0)" class="page-link" aria-label="Previous" >
                <span aria-hidden="true">«</span>
            </a>
        </li>
        <li class="page-item" v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">
            <a href="javascript:void(0)" class="page-link" v-on:click.prevent="changePage(page)">{{ page }}</a>
        </li>
        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
            <a href="javascript:void(0)" aria-label="Next" class="page-link" v-on:click.prevent="changePage(pagination.current_page + 1)">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    </ul>-->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-2">
      <li class="page-item prev-item"  v-if="pagination.current_page > 1">
        <a class="page-link" href="#" v-on:click.prevent="changePage(pagination.current_page - 1)"></a>
      </li>
      <li class="page-item" v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}" >
        <a class="page-link" href="#" v-on:click.prevent="changePage(page)">{{ page }}</a>
      </li>
      <li class="page-item next-item"  v-if="pagination.current_page < pagination.lastPage">
        <a class="page-link" href="#"  v-on:click.prevent="changePage(pagination.current_page + 1)"></a>
      </li>
    </ul>
  <!--  <ul class="pagination pagination-rounded justify-content-end mb-0 mt-2">
      <li class="page-item" v-if="pagination.current_page > 1">
        <a href="javascript:void(0)" class="page-link" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
          <span aria-hidden="true">«</span>
        </a>
      </li>
      <li class="page-item" v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}" :aria-current="{'page': page == pagination.current_page}">
        <a href="javascript:void(0)" class="page-link" v-on:click.prevent="changePage(page)">{{ page }}</a>
      </li>
      <li class="page-item" v-if="pagination.current_page < pagination.last_page">
        <a href="javascript:void(0)" aria-label="Next" class="page-link" v-on:click.prevent="changePage(pagination.current_page + 1)">
          <span aria-hidden="true">»</span>
        </a>
      </li>
    </ul>-->
  </nav>
</template>


​
​
<script>
    export default{
        props: {
            pagination: {
                type: Object,
                required: true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber() {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.lastPage) {
                    to = this.pagination.lastPage;
                }
                let pagesArray = [];
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            }
        },
        methods : {
            changePage(page) {
                this.pagination.current_page = page;
                this.$emit('paginate');
            }
        }
    }
</script>
