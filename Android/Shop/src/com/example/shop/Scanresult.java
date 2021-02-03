package com.example.shop;

import java.net.URL;

import android.R.color;
import android.R.layout;
import android.content.Context;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.preference.PreferenceManager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class Scanresult extends BaseAdapter{

	private Context Context;
	String[] c;
	String[] e;

	public Scanresult(Context applicationContext, String[] c, String[] e) {

		this.Context=applicationContext;
		this.c=c;
		this.e=e;
		
	}

	@Override
	public int getCount() {
		
		return e.length;
	}

	@Override
	public Object getItem(int arg0) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public long getItemId(int arg0) {
		// TODO Auto-generated method stub
		return 0;
	}

	@Override
	public View getView(int position, View convertview, ViewGroup parent) {

		
		LayoutInflater inflator=(LayoutInflater)Context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
		
		View gridView;
		if(convertview==null)
		{
			gridView=new View(Context);
			gridView=inflator.inflate(R.layout.activity_scanresult, null);
			
		}
		else
		{
			gridView=(View)convertview;
			
		}
		
		TextView tv1=(TextView)gridView.findViewById(R.id.textView1);
		TextView tv2=(TextView)gridView.findViewById(R.id.textView2);
		
		tv1.setTextColor(Color.BLACK);
		tv2.setTextColor(Color.BLACK);
		
		tv1.setText(c[position]);
		tv2.setText(e[position]);
		
		
		
		return gridView;
	}

}
