@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('style')

@endsection


@section('content')
    <div class="content">
        <h1>Hello World</h1>

        <p>
            This view is loaded from module: {!! config('dashboardmenu.name') !!}
        </p>
        <h1>Nestable</h1>

        <p>Drag &amp; drop hierarchical list with mouse and touch compatibility (jQuery plugin)</p>


        <div class="cf nestable-lists">

            <p><strong>Draggable Handles</strong></p>

            <textarea id="nestable2-output">If you're clever with your CSS and markup this can be achieved without any JavaScript changes.</textarea>

            <div class="dd" id="nestable3">
                <ol class="dd-list">

                </ol>
            </div>

        </div>
        <button onclick="save('#nestable3')">Save Menu</button>

    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"></script>
    <script>
      var getParent = function (ob) {
        var newobj = [];
        $.each(ob,function (i,ob) {
          newobj.push({
            menu_uuid: ob.menu_uuid,
            menu_name: ob.menu_name,
            menu_parent_uuid: null
          });
          if (ob.children) {
            var getChild = function (p,par) {
              $.each(p, function (ind, val) {
                newobj.push({
                  menu_uuid: val.menu_uuid,
                  menu_name: val.menu_name,
                  menu_parent_uuid: par
                });
                if(val.children){
                  getChild(val.children,val.menu_uuid);
                }
              });
              return newobj;
            };
            getChild(ob.children,ob.menu_uuid);
          }
        });
        return newobj;
      };

      function save(e) {
        var list = $(e);
        // res = getParent(list.nestable("serialize"));

        res = list.nestable("serialize");
        $.ajax({
          /* the route pointing to the post function */
          url: '{{route("master_data.menu.store")}}',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: "{{ csrf_token() }}", res},
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) {
            console.log(data);
          }
        });
      }

      $(document).ready(function () {
        var updateOutput = function (e) {
          var list = e.length ? e : $(e.target),
            output = list.data('output');
          if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
          } else {
            output.val('JSON browser support required for this demo.');
          }

          // console.log(flattenObject(list.nestable('serialize')));
          // $.each(list.nestable('serialize'), function () {
          //     console.log(getParent(this));
          // });
          console.log(getParent(list.nestable('serialize')));
          // console.log(list.nestable('serialize'));

        };


        var flattenObject = function (ob) {
          var toReturn = {};

          for (var i in ob) {
            if (!ob.hasOwnProperty(i)) continue;

            if ((typeof ob[i]) == 'object') {
              var flatObject = flattenObject(ob[i]);
              for (var x in flatObject) {
                if (!flatObject.hasOwnProperty(x)) continue;

                toReturn[i + '.' + x] = flatObject[x];
              }
            } else {
              toReturn[i] = ob[i];
            }
          }
          return toReturn;
        };
        $('#nestable3').nestable({
          group: 1
        })
          .on('change', updateOutput);
        // output initial serialised data

        updateOutput($('#nestable3').data('output', $('#nestable2-output')));

        $('#nestable-menu').on('click', function (e) {
          var target = $(e.target),
            action = target.data('action');
          if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
          }
          if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
          }
        });


      });
    </script>
    <script>
      $(function () {
        $.ajax({
          dataType: "json",
          url: "{{route('master_data.menu.get')}}"
        })
          .done(function (data) {
            var $menu = $("#nestable3>ol.dd-list");
            $.each(data, function () {
              $menu.append(
                getMenuItem(this)
              );
            });
            $menu;
          })
          .fail(function () {
            alert("error");
          }).then(function () {
          $('#nestable3').nestable();
        });
        var getMenuItem = function (itemData) {
          var item = $("<li />", {
            'data-menu_uuid': itemData.menu_uuid,
            'data-menu_name': itemData.menu_name,
            'class': 'dd-item dd3-item',
            html: '<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">' + itemData.menu_name + '</div>'
          });
          if (itemData.children) {
            var subList = $('<ol id="p' + itemData.menu_uuid + '" class="dd-list">');
            $.each(itemData.children, function () {
              subList.append(getMenuItem(this));
            });
            item.append(subList);
          }
          return item;
        };

      });
    </script>
