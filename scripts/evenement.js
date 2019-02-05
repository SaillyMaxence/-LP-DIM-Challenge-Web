$(function() {
    var data = [
        {
            "name":       "Tiger Nixon",
            "position":   "System Architect",
            "salary":     "$3,120",
            "start_date": "2011/04/25",
            "office":     "Edinburgh",
            "extn":       "5421",
            "button":       "<button class=\"btn btn-primary\"> Modifier </button>",
            "supprimer":       "<button class=\"btn btn-primary\"> Modifier </button>"
        },
        {
            "name":       "Garrett Winters",
            "position":   "Director",
            "salary":     "$5,300",
            "start_date": "2011/07/25",
            "office":     "Edinburgh",
            "extn":       "8422",
            "button":       "<button class=\"btn btn-primary\"> Modifier </button>",
            "supprimer":       "<button class=\"btn btn-primary\"> Modifier </button>"
        }
        ,
        {
            "name":       "Garrett Winters",
            "position":   "Director",
            "salary":     "$5,300",
            "start_date": "2011/07/25",
            "office":     "Edinburgh",
            "extn":       "8422",
            "button":       "<button class=\"btn btn-primary\"> Modifier </button>",
            "supprimer":       "<button class=\"btn btn-primary\"> Modifier </button>"
        }
        ,
        {
            "name":       "Garrett Winters",
            "position":   "Director",
            "salary":     "$5,300",
            "start_date": "2011/07/25",
            "office":     "Edinburgh",
            "extn":       "8422",
            "button":       "<button class=\"btn btn-primary\"> Modifier </button>",
            "supprimer":       "<button class=\"btn btn-primary\"> Modifier </button>"
        }
        ,
        {
            "name":       "Garrett Winters",
            "position":   "Director",
            "salary":     "$5,300",
            "start_date": "2011/07/25",
            "office":     "Edinburgh",
            "extn":       "8422",
            "button":     "<button class=\"btn btn-primary\"> Modifier </button>",
            "supprimer":  "<button class=\"btn btn-primary\"> Modifier </button>"
        }
    ]

    $('#datatable').dataTable( {
        data: data,
        columns: [
            { data: 'name' },
            { data: 'position' },
            { data: 'salary' },
            { data: 'office' },
            { data: 'button' },
            { data: 'supprimer'} 
        ]
    } );





});