from rest_framework import status
from rest_framework.decorators import api_view
from rest_framework.response import Response
from django.views.generic import View
from api.models import Tweet
from api.serializers import TweetSerializer
from rest_framework.renderers import JSONRenderer
from django.http import HttpResponse
from django.views.decorators.csrf import csrf_exempt

@api_view(['POST'])
def create_tweet(request):
    """
    Create a tuit by user
    :param request:
    :return:
    """
    tweet_instance = Tweet()
    tweet_instance.id_user = request.POST.get('id_user', 0)
    tweet_instance.content = request.POST.get('content', 0)
    tweet_instance.save()
    return HttpResponse('Tweet created')


class TweetListAPI(View):

    def get(self, request, id_user):
        tweets = Tweet.objects.filter(id_user=id_user)
        serializer = TweetSerializer(tweets, many=True)
        serialized_tweets = serializer.data
        renderer_instance = JSONRenderer()
        json_tweets = renderer_instance.render(serialized_tweets)
        return HttpResponse(json_tweets)