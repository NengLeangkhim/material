<style>
    .sr-container {
        background-color: #fff;

    }
    .sr-header {
        padding-top: 16px;
    }
</style>
<section class="content">
    <div class="sr-container container-fluid">
        <div class="sr-header">
            <div class="card">
                <div class="card-body">
                    <h4>Question & Answer Result</h4>
                </div>
            </div>
        </div>
        <div class="sr-body row">
            @foreach ($questionList as $qKey => $question)
                <div class="sr-question col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="sr-question-question">
                                <h5>{{$question->question}}</h5>
                            </div>
                            <div class="sr-question-answer">
                                @if ($question->is_mcq)
                                    {{-- THIS IS FOR MCQ QUESTION USING CHART TO SHOW DATA --}}
                                    <div id="answer-chart-{{$qKey}}"></div>
                                @else
                                    @foreach ($question->question_answer_list as $key => $item)
                                        <h6>{{$key + 1}} : {{$item->answer_text}}</h6>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(renderAnswerChart);
        function renderAnswerChart(){
            $questionList = {!! json_encode($questionList, JSON_HEX_TAG) !!};
            $.each($questionList, function(index, question){
                if(question.is_mcq) {
                    if(!(question.question_answer_list.length < 1)){
                        drawChart(index, question.question_answer_list);
                    }
                }
            })
        }
        function drawChart(id, data1) {
            var virtualData = [["Element", "Density", { role: "style" } ]]
            $.each(data1, function(index, value){
                virtualData.push([value.answer, value.total_suggestion,"#13AAE2"])
            })

            var data = google.visualization.arrayToDataTable(virtualData);
            var view = new google.visualization.DataView(data);
            view.setColumns(
                [
                    0,
                    1,
                    { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation"},
                    2
                ]
            );
            var options = {
                title: "",
                // width: 600,
                height: 400,
                bar: {groupWidth: "50%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('answer-chart-'+id));
            chart.draw(view, options);
        }
        renderAnswerChart();
    })
</script>
