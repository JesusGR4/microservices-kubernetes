from rest_framework import serializers
from api.models import Tweet

class TweetSerializer(serializers.Serializer):
    id_tweet = serializers.ReadOnlyField()
    id_user = serializers.ReadOnlyField()
    content = serializers.CharField()